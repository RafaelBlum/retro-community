<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChannelResource\Pages;
use App\Filament\Resources\ChannelResource\RelationManagers;
use App\Models\Campaing;
use App\Models\Channel;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\IconPosition;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;


class ChannelResource extends Resource
{
    protected static ?string $model = Channel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $slug = 'canais';
    protected static ?string $pluralModelLabel = "Canais";
    protected static ?string $modelLabel = "Canal";

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make()->schema([
                        TextInput::make('title')
                            ->label('Nome do seu canal')
                            ->hintIcon('heroicon-m-check-badge', tooltip: 'Seu canal do Youtube.')
                            ->hintColor(Color::Green)
                            ->required(),
                        TextInput::make('name')
                            ->label('Seu nome')
                            ->autocapitalize('words')
                            ->required(),
                        ColorPicker::make('color')
                            ->label('Cor base do seu canal')
                            ->default('ffffff'),
                        Textarea::make('description')
                            ->label('Descrição do canal')
                            ->columnSpanFull(),
                        TextInput::make('link')
                            ->label('Link canal do Youtube')
                            ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Adicione o nome do seu canal da URL sem "@"')
                            ->hintColor(Color::Yellow)
                            ->prefix('https://www.youtube.com/@')->suffixIcon('heroicon-m-globe-alt')
                            ->required()
                            ->columnSpanFull(),




                    ])->columns(3),

                ])->columnSpan([
                    'default' => 2,
                    'sm' => 1,
                    'md' => 2,
                    'lg' => 2,
                    'xl' => 2,
                    '2xl' => 2
                ]),

                Group::make()->schema([
                    Section::make()->schema([
                        FileUpload::make('brand')
                            ->label('')
                            ->disk('public')
                            ->debounce()
                            ->helperText('Logo do seu canal')
                            ->avatar()
                            ->directory('channel_brand')
                            ->columnSpanFull(),

                        Placeholder::make('created_at')
                            ->label('Criado em')
                            ->content(fn (Channel $record): ?string => $record->created_at?->format('M d, Y')),

                        Placeholder::make('updated_at')
                            ->label('Última atualização')
                            ->content(fn (Channel $record): ?string => $record->updated_at?->diffForHumans()),

                    ])->columns(2),

                ])->columnSpan([
                    'default' => 1,
                    'sm' => 1,
                    'md' => 1,
                    'lg' => 1,
                    'xl' => 1,
                    '2xl' => 1
                ]),

                Placeholder::make('')->label('Campanha do canal '),

                /**
                 * SECTION CAMPING CHANNEL USER
                */
                Grid::make(9)->relationship('camping')->schema([

                    Section::make()->schema([
                        TextInput::make('title')
                        ->label(''),
                        FileUpload::make('image')
                            ->label('')
                            ->disk('public')
                            ->debounce()
                            ->helperText('Imagem da sua campanha, informativa.')
                            ->directory('campaing_folder')
                            ->image()
                            ->columnSpanFull()
                    ])->columnSpan(3),

                    Section::make()->schema([
                        Grid::make(8)->schema([
                            Group::make()->schema([



                                TextInput::make('linkGoal')
                                    ->label('Link campanha status')
                                    ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Adicione o link da campanha do seu LivePix')
                                    ->hintColor(Color::Yellow)
                                    ->prefixIcon('heroicon-m-currency-dollar')->suffixIcon('heroicon-m-chart-bar')
                                    ->required(),

                                TextInput::make('qrCode')
                                    ->label('Link QR Code')
                                    ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Adicione o link do seu QRCODE do livePix')
                                    ->hintColor(Color::Yellow)
                                    ->prefixIcon('heroicon-m-qr-code')->suffixIcon('heroicon-m-viewfinder-circle')
                                    ->required(),




                            ])->columnSpan(8),


                        ]),

                        Textarea::make('content')
                            ->label('Descrição da campanha')
                            ->required()
                            ->columnSpanFull(),

                        Toggle::make('camping')
                            ->label(function (Get $get){
                                if($get('camping') == true){
                                    return 'Campanha ativada';
                                }
                                return 'Campanha desativada';
                            })->live()->columnSpanFull(),
                    ])->columnSpan(6),
                ]),
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('brand')
                    ->circular()
                    ->label(''),

                TextColumn::make('title')
                    ->label('Canal')
                    ->description(fn(Channel $record) => $record->name)
                    ->icon('heroicon-m-play-circle')
                    ->iconPosition(IconPosition::After)
                    ->iconColor(Color::Green),

                TextColumn::make('user.name')
                    ->label('Usuário'),

                Tables\Columns\CheckboxColumn::make('camping.camping')
                    ->label('Campanha'),

                TextColumn::make('link')
                    ->icon('heroicon-m-at-symbol')
                    ->iconPosition(IconPosition::Before)
                    ->iconColor(Color::Indigo)
                    ->copyable(),

            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    EditAction::make(),
                    ViewAction::make(),
                ])->tooltip("Menu")
            ])
            ->bulkActions([
                //
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
            'index' => Pages\ListChannels::route('/'),
            'create' => Pages\CreateChannel::route('/create'),
            'edit' => Pages\EditChannel::route('/{record}/edit'),
        ];
    }
}
