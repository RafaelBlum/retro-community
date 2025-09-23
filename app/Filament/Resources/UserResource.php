<?php

namespace App\Filament\Resources;

use App\Enums\PanelTypeEnum;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\Pages\EditUser;
use App\Filament\Resources\UserResource\Pages\ListUsers;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\CreateAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserResource extends Resource

{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'usuarios';
    protected static ?int $navigationSort = 1;
    protected static ?string $navigationBadgeTooltip = "Total de usuários";
    protected static string | \UnitEnum | null $navigationGroup = "Admin Usuários";

    protected static ?string $recordTitleAttribute = 'name';
    protected static string | \BackedEnum | null $activeNavigationIcon = 'heroicon-o-users';

    protected static ?string $modelLabel = "Usuário";

    protected static string | \BackedEnum | null $navigationIcon = 'heroicon-o-user-circle';


    public static function form(Schema $schema): Schema
    {
        return $schema
            ->components([
                Grid::make(3)->schema([

                    FileUpload::make('avatar')
                        ->label('')
                        ->default('default.jpg')
                        ->disk('public')
                        ->directory('thumbnails')
                        ->removeUploadedFileButtonPosition('right')
                        ->openable()
                        ->columnSpan(1),

                    Section::make()->icon(Heroicon::Star)->schema([
                        Grid::make(3)->schema([

                            Group::make()->schema([
                                TextInput::make('name')
                                    ->label('Nome completo')
                                    ->required()
                                    ->maxLength(150)
                                    ->minLength(2)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state, $set) {
                                        if (strlen($state) < 2 || strlen($state) > 150) {
                                            self::validateCaracteres(2, 255);
                                        }
                                    }),
                            ])->columnSpan(1),

                            Group::make()->schema([
                                TextInput::make('email')
                                    ->label('E-mail')
                                    ->email()
                                    ->required()
                                    ->maxLength(255)
                                    ->reactive()
                                    ->afterStateUpdated(function ($state) {
                                        if (!filter_var($state, FILTER_VALIDATE_EMAIL) && !empty($state)) {
                                            Notification::make()
                                                ->title('E-mail inválido')
                                                ->body('O e-mail inserido não é válido. Verifique e tente novamente.')
                                                ->danger()
                                                ->send();
                                        }

                                        if(!self::validateEmaildatabase($state))
                                        {
                                            Notification::make()
                                                ->title('E-mail inválido')
                                                ->body('O e-mail inserido já esta em uso. Verifique e tente novamente.')
                                                ->danger()
                                                ->send();
                                        }
                                    }),

                            ])->columnSpan(2),
                        ]),

                        Grid::make(8)->schema([
                            Group::make()->schema([
                                Select::make('panel')
                                    ->label('Tipo de usuário')
                                    ->options(PanelTypeEnum::class)
                                    ->required()
                                    ->native(false),

                            ])->columnSpan(3),

                            Group::make()->schema([
                                TextInput::make('password')
                                    ->label('Senha')
                                    ->password()
                                    ->revealable()
                                    ->dehydrated(fn (?string $state): bool => filled($state))
                                    ->required(fn (string $operation): bool => $operation === 'create')
                                    ->minLength(8) // Mínimo de 8 caracteres
                                    ->maxLength(32) // Máximo de 32 caracteres
                                    ->reactive()
                                    ->afterStateUpdated(function ($state) {
                                        if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/', $state) && !empty($state)) {
                                            Notification::make()
                                                ->title('Senha inválida')
                                                ->body('A senha deve ter pelo menos 8 caracteres, incluindo uma letra maiúscula, um número e um caractere especial.')
                                                ->danger()
                                                ->send();
                                        }
                                    }),
                            ])->columnSpan(5),
                        ])
                    ])->columnSpan(2),
                            Tabs::make('informations')->tabs([
                                Tab::make('Meu Canal')->icon('heroicon-m-identification')->schema([
                                    Grid::make(8)
                                        ->relationship('channel')
                                        ->schema([

                                            FileUpload::make('brand')
                                                ->label('')
                                                ->disk('public')
                                                ->debounce()
                                                ->helperText('Logo do seu canal')
                                                ->directory('channel_brand')
                                                ->removeUploadedFileButtonPosition('right')
                                                ->openable()
                                                ->columnSpan(1),

                                            Group::make()->schema([
                                                Grid::make(4)->schema([
                                                    Group::make()->schema([
                                                        TextInput::make('title')
                                                            ->label('Nome do seu canal')
                                                            ->hintIcon('heroicon-m-check-badge', tooltip: 'Seu canal do Youtube.')
                                                            ->hintColor(Color::Green)
                                                            ->required()
                                                            ->live(onBlur: true)
                                                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                                                        TextInput::make('slug')->disabled()->label(""),

                                                    ])->columnSpan(2),

                                                    Group::make()->schema([
                                                        TextInput::make('name')
                                                            ->label('Seu nome')
                                                            ->required(),
                                                    ])->columnSpan(2),
                                                ])->columnSpanFull(),



                                                Grid::make(4)->schema([
                                                    Group::make()->schema([
                                                        TextInput::make('link')
                                                            ->label('Link canal do Youtube')
                                                            ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Adicione o nome do seu canal da URL sem "@"')
                                                            ->hintColor(Color::Yellow)
                                                            ->prefix('https://www.youtube.com/@')->suffixIcon('heroicon-m-globe-alt')
                                                            ->required(),
                                                    ])->columnSpan(3),

                                                    Group::make()->schema([
                                                        ColorPicker::make('color')->label('Cor base do canal'),
                                                    ])->columnSpan(1),
                                                ])->columnSpanFull(),

                                                Textarea::make('description')
                                                    ->label('Descrição')
                                                    ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Descreva brevemente aqui sobre seu canal.')
                                                    ->hintColor(Color::Yellow)
                                                    ->maxLength(255),

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

    public static function validateCaracteres(int $min, int $max): void
    {
        Notification::make()
            ->title('Erro de validação')
            ->body('O nome deve ter entre ' . $min . ' e ' . $max .' caracteres.')
            ->danger()
            ->send();
    }

    public static function validateEmaildatabase(string $email):bool
    {
        return !User::where('email', $email)->exists();
    }

    public static function actions(): array
    {
        return [
            CreateAction::make()->mutateDataUsing(function (array $data): array {
                $data['user_id'] = auth()->id();

                return $data;
            })->beforeCreate(function ($record, $data) {


                return $data;
            }),
        ];
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->circular()
                    ->label('image'),

                TextColumn::make('name')
                    ->label('Nome')
                    ->description(fn(User $record) => $record->email)
                    ->searchable(),

                ImageColumn::make('channel.brand')
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
                Filter::make('User_posts')
                    ->label('Com postagens [1]')
                    ->query(
                        function (Builder $query): Builder
                        {
                            return $query->whereHas('posts');
                        }
                ),

                Filter::make('has_posts')
                ->label('Com postagens [2]')
                ->toggle()
                ->query(fn(Builder $query): Builder => $query->whereHas('posts'))
            ])
            ->persistFiltersInSession()
            ->filtersTriggerAction(
                fn(Action $action) => $action
                ->link()
                ->icon('heroicon-m-magnifying-glass-circle')
                ->label('Filtros'),
            )

            ->recordActions([
                ActionGroup::make([
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
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => ListUsers::route('/'),
            'create' => CreateUser::route('/create'),
            'edit' => EditUser::route('/{record}/edit'),
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
