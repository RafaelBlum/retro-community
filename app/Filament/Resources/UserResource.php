<?php

namespace App\Filament\Resources;

use App\Enums\MaritalStatusEnum;
use App\Enums\PanelTypeEnum;
use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\Post;
use App\Models\User;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Support\Colors\Color;
use Filament\Tables;
use Filament\Tables\Actions\AttachAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?int $navigationSort = 1;
    protected static ?string $navigationBadgeTooltip = "Total de usuários";
    protected static ?string $navigationGroup = "Admin Usuários";
    protected static ?string $activeNavigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = "Usuário";

    protected static ?string $navigationIcon = 'heroicon-o-user-circle';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)->schema([

                    Section::make()->schema([
                        FileUpload::make('avatar')
                            ->label('')
                            ->default('default.jpg')
                            ->disk('public')
                            ->directory('thumbnails')
                            ->columnSpanFull()
                    ])->columnSpan(1),

                    Section::make()->schema([
                        Grid::make(3)->schema([

                            Group::make()->schema([
                                TextInput::make('name')
                                    ->label('Nome completo')
                                    ->required()
                                    ->maxLength(150),
                            ])->columnSpan(1),

                            Group::make()->schema([
                                TextInput::make('email')
                                    ->label('E-mail')
                                    ->email()
                                    ->required()
                                    ->maxLength(255),

                            ])->columnSpan(2),
                        ]),

                        Grid::make(8)->schema([
                            Group::make()->schema([
                                Select::make('panel')
                                    ->label('Tipo de usuário')
                                    ->options(PanelTypeEnum::class)
                                    ->native(false),

                            ])->columnSpan(3),

                            Group::make()->schema([
                                TextInput::make('password')
                                    ->label('Senha')
                                    ->password()
                                    ->revealable()
                                    ->dehydrated(fn (?string $state): bool => filled($state))
                                    ->required(fn (string $operation): bool => $operation === 'create')
                                    ->minLength(3)
                                    ->maxLength(255),
                            ])->columnSpan(5),
                        ]),
                    ])->columnSpan(2),


                    Tabs::make('informations')->tabs([

                        Tab::make('Meu Canal')->icon('heroicon-m-identification')->schema([
                            Grid::make(8)->relationship('channel')->schema([
                                    Group::make()->schema([
                                        FileUpload::make('brand')
                                            ->label('')
                                            ->disk('public')
                                            ->debounce()
                                            ->helperText('Logo do seu canal')
                                            ->avatar()
                                            ->directory('channel_brand')
                                            ->columnSpanFull()
                                    ])->columnSpan(1),

                                    Group::make()->schema([
                                        Grid::make(4)->schema([
                                            Group::make()->schema([
                                                TextInput::make('title')
                                                    ->label('Nome do seu canal')
                                                    ->hintIcon('heroicon-m-check-badge', tooltip: 'Seu canal do Youtube.')
                                                    ->hintColor(Color::Green)
                                                    ->required(),
                                            ])->columnSpan(2),

                                            Group::make()->schema([
                                                TextInput::make('name')
                                                    ->label('Seu nome')
                                                    ->required(),
                                            ])->columnSpan(2),
                                        ])->columnSpanFull(),

                                        TextInput::make('link')
                                            ->label('Link canal do Youtube')
                                            ->prefix('https://www.youtube.com/@')->suffixIcon('heroicon-m-globe-alt')
                                            ->required(),
                                    ])->columnSpan(7),
                            ]),
                        ]),
                    ])->columnSpanFull()->activeTab(1)->persistTabInQueryString(),
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->circular()
                    ->label(''),

                TextColumn::make('name')
                    ->label('Nome')
                    ->description(fn(User $record) => $record->email)
                    ->searchable(),

                ImageColumn::make('posts.featured_image_url')
                    ->circular()
                    ->stacked()
                    ->limit(3),

                TextColumn::make('channel.title')
                ->label('Canal'),

                TextColumn::make('panel')
                    ->label('Acesso')
                    ->searchable()
                    ->badge(),

                TextColumn::make('posts_count')
                    ->counts('posts')
                    ->label('Publicações'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make()
                        ->action(function(User $record) {
                            if($record->avatar != 'default.jpg'){
                                Storage::delete('public/' . $record->avatar);
                            }
                            $record->delete();
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Deletar ' . static::$modelLabel)
                        ->modalDescription('Tem certeza de que deseja excluir este ' . static::$modelLabel . '? Isto não pode ser desfeito.')
                        ->modalSubmitActionLabel('Sim, deletar!'),
                    ViewAction::make(),
                ])->tooltip("Menu")
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return static::getModel()::query()->where('id', '!=', auth()->id())->Where('panel', '!=', 'super-admin');
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNavigationBadge(): ?string
    {
        return static::getModel()::count();
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return static::getModel()::count() > 10 ? 'warning' : 'success';
    }
}
