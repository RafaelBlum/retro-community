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
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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
                            ->relationship(
                                'channel',
                                'name',
                                modifyQueryUsing: function (Builder $query) {

                                    // Verifica se o ID do modelo Campaing está presente
//                                    if ($this->getModel() && $this->getModel()->exists) {
//                                        // No modo de edição: filtra para mostrar apenas o canal associado
//                                        return $query->where('id', $this->getModel()->channel_id);
//                                    } else {
//                                        // No modo de criação: filtra para mostrar apenas canais sem campanha
//                                        return $query->doesntHave('camping');
//                                    }
                                    return static::modifyChannelQuery($query);
                                    //return $query->doesntHave('camping');
                                })
                            ->required(),

                        TextInput::make('title')
                            ->required()
                            ->maxLength(255),

                        Textarea::make('content')
                            ->required()
                            ->columnSpanFull(),
                        TextInput::make('linkGoal')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('qrCode')
                            ->maxLength(255)
                            ->default(null),

                        Toggle::make('camping')
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

// Exemplo de método chamado na configuração do formulário
    protected static function modifyChannelQuery(Builder $query)
    {
        $model = static::getModelInstance(); // Obtém a instância do modelo

        if ($model && $model->exists) {
            dd('existe');

            return $query->where('id', $model->channel_id);
        } else {
            dd('NÃO existe');
            return $query->doesntHave('camping');
        }
    }

    // Método auxiliar para obter a instância do modelo
    protected static function getModelInstance()
    {
        $te = static::$model::first();
        dd($te);

        // Aqui você pode retornar uma instância do modelo se necessário
        //request()->route('record_id')
        return static::$model::first(); // Exemplo simplificado
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
                IconColumn::make('camping')
                    ->label('Status')
                    ->boolean(),

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
