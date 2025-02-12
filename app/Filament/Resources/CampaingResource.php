<?php

namespace App\Filament\Resources;

use App\Enums\PanelTypeEnum;
use App\Filament\Resources\CampaingResource\Pages;
use App\Filament\Resources\CampaingResource\RelationManagers;
use App\Models\Campaing;
use App\Models\Channel;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;

class CampaingResource extends Resource
{
    protected static ?string $model = Campaing::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $modelLabel = "Campanha";

    protected static ?string $slug = 'campanhas';
    public static function form(Form $form): Form
    {
        return $form
            ->schema([

                Grid::make(3)->schema([

                    Section::make()->schema([
                        FileUpload::make('image')
                            ->label('Banner da sua campanha')
                            ->directory('campaing_folder')
                            ->default('default-post.jpg')
                            ->disk('public')
                            ->columnSpanFull()
                            ->image(),

                    ])->columnSpan(1),

                    Section::make()->schema([
                        Grid::make(3)->schema([

                            Placeholder::make('linkGoal')
                                ->label('Meta da sua campanha')
                                ->content(function (Campaing $record) {
                                    if (is_null($record)) {
                                        return 'Nenhum QR Code selecionado';
                                    }
                                    return new HtmlString(
                                        view('filament.campaing.iframeGoal', ['state' => $record])->render()
                                    );
                                })->columnSpanFull(),

                            Toggle::make('camping')
                                ->label('Destacar campanha')
                                ->afterStateUpdated(function ($state, $record) {
                                    if ($state) {
                                        $record->update(['camping' => true]); // Ativa a campanha atual
                                        Campaing::where('channel_id', $record->channel_id)
                                            ->where('id', '!=', $record->id)
                                            ->update(['camping' => false]); // Desativa as outras campanhas do mesmo canal
                                    }
                                })
                                ->required()
                                ->visible(function (){
                                    if(auth()->user()->panel->value == 'super-admin'){
                                        return true;
                                    }
                                    return false;
                                }),

                        ]),
                    ])->columnSpan(2)
                        ->visible(function(Get $get){
                        if($get('linkGoal') !== null){
                            return true;
                        }
                        return false;
                    }),

                    Section::make()->schema([

                        Placeholder::make('qrCode')
                            ->label('Seu QR Code')
                            ->content(function (Campaing $record) {
                                if (is_null($record)) {
                                    return 'Nenhum QR Code selecionado';
                                }
                                return new HtmlString(
                                    view('filament.campaing.iframe', ['state' => $record])->render()
                                );
                            }),
                    ])->columnSpan(1)
                        ->visible(function(Get $get){
                        if($get('qrCode') !== null){
                            return true;
                        }
                        return false;
                    }),

                    Section::make()->schema([

                        Select::make('channel_id')
                            ->label('Canal responsável')
                            ->options(function () {
                                $model = static::getModelInstance();

                                if ($model && $model->exists) {
                                    return Channel::where('id', $model->channel_id)->pluck('title', 'id');
                                } else {
                                    return Channel::whereDoesntHave('camping')->pluck('title', 'id');
                                }
                            })
                            ->default(fn ($record) => $record?->channel_id)
                            ->reactive()

                            ->afterStateHydrated(function ($state, $set, $record) {
                                if ($record) {
                                    $set('channel_id', $record->channel_id);
                                }
                            })
                            ->disabled(fn ($record) => $record !== null) // ⚠️ Isso bloqueia edição do campo na edição
                            ->visible(fn ($record) => $record === null) // Só exibe na criação
                            ->required(),

                        /**
                         * Campo exibe somente no form de edição
                         */
                        TextInput::make('channel_name')
                            ->label('Canal Responsável')
                            ->default(fn ($record) => optional($record?->channel)->title)
                            ->disabled() // Impede edição
                            ->dehydrated(false)
                            ->visible(fn ($record) => filled($record) && filled($record->channel))
                            ->afterStateHydrated(fn ($set, $record) => $set('channel_name', optional($record?->channel)->title)),

                        TextInput::make('title')
                            ->label("Titulo")
                            ->required()
                            ->maxLength(255),

                        Textarea::make('content')
                            ->label("Descrição")
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('linkGoal')
                            ->label("Link livePix Meta")
                            ->required()
                            ->maxLength(255),

                        TextInput::make('qrCode')
                            ->label("Link LivePix QRCode")
                            ->maxLength(255)
                            ->default(null),

                        TextInput::make('linkPagePix')
                            ->label('Link livePix Perfil')
                            ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Adicione nome da sua pagina do livePix')
                            ->hintColor(Color::Yellow)
                            ->prefix('https://livepix.gg/')->suffixIcon('heroicon-m-globe-alt')
                            ->required(),
                    ])->columnSpan(2),
                ]),
            ])->columns([
                'default' => 2,
                'sm' => 1,
                'md' => 2,
                'lg' => 2,
                'xl' => 2,
                '2xl' => 2
            ]);
    }

    protected static function getModelInstance()
    {
        static $instance = null;
        
        if ($instance === null) {
            $id = request()->route('record');
            if ($id) {
                $instance = Campaing::find($id);
            }
        }

        return $instance;
    }

    protected static function modifyChannelQuery(Builder $query)
    {
        $model = static::getModelInstance();

        if ($model && $model->exists) {
            return $query->where('id', $model->channel_id)
                ->orWhereDoesntHave('camping'); // Sempre incluir o canal original
        } else {
            return $query->whereDoesntHave('camping');
        }
    }




    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('')
                ->width(60)
                ->height(60),
                TextColumn::make('channel.title')
                    ->label('Canal'),

                ToggleColumn::make('camping')
                    ->label('Em destaque')
                    ->updateStateUsing(function ($record, $state) {
                        $record->update(['camping' => $state]);
                        return $state;
                    })
                    ->visible(function (){
                        if(auth()->user()->panel->value == 'super-admin'){
                            return true;
                        }
                        return false;
                    }),


                TextColumn::make('title')
                    ->label('Titulo')
                    ->limit(50)
                    ->description(function (Campaing $record): View
                    {
                        return view('components.partials.icon', [
                            'state' => $record,
                        ]);
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    EditAction::make(),

                    ViewAction::make()
                        ->label('Ver Detalhes')
                        ->modalHeading('Detalhes da Campanha')
                        ->modalWidth('full') // Tamanho máximo

                        ->modalSubmitActionLabel('Fechar')
                        ->icon('heroicon-o-eye')
                        ->color('primary')
                        ->form(fn (Form $form, $record) => $form->schema([

                            TextInput::make('title')
                                ->label('Título'),

                            TextInput::make('content')
                                ->label('Descrição'),

                            TextInput::make('linkGoal')
                                ->label('Descrição'),

                            TextInput::make('qrCode')
                                ->label('Descrição'),

                            FileUpload::make('image')
                                ->label('Banner da sua campanha')
                                ->directory('campaing_folder')
                                ->default('default-post.jpg')
                                ->disk('public')
                                ->columnSpanFull()
                                ->image()
                        ]))
                        ->action(function($record) {
                            return view('filament.campaing.iframe', ['record' => $record]);
                        }),

                    DeleteAction::make()
                        ->action(function(Campaing $record) {
                            if($record->image){
                                Storage::delete('public/' . $record->image);
                            }
                            $record->delete();
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Deletar ' . static::$modelLabel)
                        ->modalDescription('Tem certeza de que deseja excluir a ' . static::$modelLabel . '? Isto não pode ser desfeito.')
                        ->modalSubmitActionLabel('Sim, deletar!'),
                ])->tooltip("Menu")
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }


    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCampaings::route('/'),
            'create' => Pages\CreateCampaing::route('/create'),
            'edit' => Pages\EditCampaing::route('/{record}/edit'),
        ];
    }
}
