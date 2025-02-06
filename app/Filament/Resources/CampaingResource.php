<?php

namespace App\Filament\Resources;

use App\Enums\PanelTypeEnum;
use App\Filament\Resources\CampaingResource\Pages;
use App\Filament\Resources\CampaingResource\RelationManagers;
use App\Models\Campaing;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Form;
use Filament\Forms\Get;
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
                                ->content(function ($get) {
                                    if (is_null($get('linkGoal'))) {
                                        return 'Nenhum qrCode selecionado';
                                    }

                                    return new HtmlString(
                                        view(
                                            view: 'filament.campaing.iframeGoal'
                                        )->render()
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
                                ->required(),

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

                            ->content(function ($get) {
                                if (is_null($get('qrCode'))) {
                                    return 'Nenhum qrCode selecionado';
                                }
                                return new HtmlString(
                                    view(
                                        view: 'filament.campaing.iframe'
                                    )->render()
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
                            ->relationship('channel', 'title', function (Builder $query) {
                                return static::modifyChannelQuery($query);
                            })
                            ->required(),


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
        $id = request()->route('record');
        if ($id) {
            return static::$model::find($id);
        }
        return null;
    }

    protected static function modifyChannelQuery(Builder $query)
    {
        $model = static::getModelInstance();

        if($model && $model->exists) {
            return $query->where('id', $model->channel_id);
        }else{
            return $query->doesntHave('camping');
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
                        if ($state) {
                            Campaing::where('channel_id', $record->channel_id)
                                ->where('id', '!=', $record->id)
                                ->update(['camping' => false]);

                            $record->update(['camping' => true]);
                        }
                    })->visible(function (){
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
                        return view('components.partials.icon', ['state' => $record]);
                    }),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    EditAction::make(),
                    ViewAction::make(),
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
