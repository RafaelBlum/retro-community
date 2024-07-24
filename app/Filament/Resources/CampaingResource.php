<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CampaingResource\Pages;
use App\Filament\Resources\CampaingResource\RelationManagers;
use App\Models\Campaing;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\ViewField;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
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

                        Placeholder::make('qrCode')
                            ->label('Últimas qrCode')

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
                        Forms\Components\Select::make('channel_id')
                            ->relationship('channel', 'name')
                            ->required(),
                        Forms\Components\TextInput::make('title')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Textarea::make('content')
                            ->required()
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('linkGoal')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('qrCode')
                            ->maxLength(255)
                            ->default(null),
                        Forms\Components\Toggle::make('camping')
                            ->required(),
                        Forms\Components\FileUpload::make('image')
                            ->directory('campaing_folder')
                            ->image(),
                    ])->columnSpan(2),
                ]),



                Fieldset::make('qrCode')
                    ->label('QR CODE')
                    ->visible(function(Get $get){
                        if($get('qrCode') !== null){
                            return true;
                        }
                        return false;
                    }),

                Section::make()
                    ->schema([
                        Placeholder::make('qrCode')
                            ->label('Últimas qrCode')
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
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('channel.name')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('linkGoal')
                    ->searchable(),
                Tables\Columns\TextColumn::make('qrCode')
                    ->searchable(),
                Tables\Columns\IconColumn::make('camping')
                    ->boolean(),
                Tables\Columns\ImageColumn::make('image'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
