<?php

namespace App\Filament\Resources\Users\Schemas;

use App\Models\User;
use Filament\Actions\CreateAction;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Notifications\Notification;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Tabs;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Schemas\Schema;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                Grid::make(8)->schema([
                    FileUpload::make('avatar')
                        ->label('')
                        ->default('default.jpg')
                        ->disk('public')
                        ->directory('thumbnails')
                        ->openable()
                        ->imageEditor()
                        ->required()
                        ->validationMessages([
                            'required' => 'Envie uma imagem ou mantenha a padrão do usuário.',
                        ])
                        ->loadingIndicatorPosition('left')
                        ->panelLayout('integrated')
                        ->removeUploadedFileButtonPosition('right')
                        ->uploadButtonPosition('left')
                        ->uploadProgressIndicatorPosition('left')
                        ->maxSize(1024)
                        ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/avif'])
                        ->columnSpan(2),

                    Group::make()->schema([

                        Grid::make(4)->schema([
                            Group::make()->schema([

                                TextInput::make('name')
                                    ->label('Nome')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->rule(['min:2', 'max:150'])
                                    ->validationMessages([
                                        'required'  => 'O nome completo é obrigatório',
                                        'min'       => 'O nome deve ter pelo menos :min caracteres',
                                        'max'       => 'O nome não pode ter mais de :max caracteres',
                                    ])
                                    ->helperText(fn($get) => $get('name_error') ?? 'Informe seu nome e sobrenome.')
                                    ->live(onBlur: true),

                            ])->columnSpan(2),
                            Group::make()->schema([

                                TextInput::make('email')
                                    ->label('E-mail')
                                    ->email()
                                    ->required()
                                    ->live(onBlur: true)
                                    ->unique(ignoreRecord: true)
                                    ->afterStateUpdated(function ($state, callable $set) {
                                        if(!filter_var($state, FILTER_VALIDATE_EMAIL) && filled($state))
                                        {
                                            $set('email_error', 'O e-mail inserido não é valido.');
                                        }else
                                        {
                                            $set('email_error', null);
                                        }
                                    })
                                    ->helperText(fn($get) => $get('email_error') ?? 'Informe um endereço de e-mail válido e único.')
                                    ->visible(fn(string $operation) => in_array($operation, ['create', 'edit'])),
                            ])->columnSpan(2),
                        ])->columnSpanFull(),

                        Grid::make(4)->schema([
                            Group::make()->schema([
                                TextInput::make('password')
                                    ->password()
                                    ->label('Senha')
                                    ->revealable()
                                    ->required(fn(string $operation) => $operation === 'create')
                                    ->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
                                    ->dehydrated(fn($state) => filled($state))
                                    ->rules(function ($get, string $operation) {
                                        if ($operation === 'edit' && blank($get('password'))) {
                                            return [];
                                        }

                                        return [
                                            'required',
                                            'string',
                                            'min:8',
                                            'max:32',
                                            'regex:/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,32}$/',
                                        ];
                                    })
                                    ->validationMessages([
                                        'min' => 'A senha deve ter pelo menos :min caracteres.',
                                        'max' => 'A senha não pode ter mais de :max caracteres.',
                                        'regex' => 'A senha deve conter pelo menos uma letra maiúscula, um número e um caractere especial.',
                                    ])
                                    ->visible(fn (string $operation) => in_array($operation, ['create', 'edit']))
                                    ->suffixIcon('heroicon-o-lock-closed')

                                    ->helperText(fn($get, $operation) => self::passwordHelper($get, $operation))
                                    ->live()
                                    ->reactive()
                                    ->afterStateUpdated(function (callable $set, $state) {
                                        $regex = '/^(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,32}$/';
                                        $set('password_strength', preg_match($regex, $state) ? 'Forte' : 'Fraca');
                                    }),

                            ])->columnSpan(2),
                            Group::make()->schema([
                                Toggle::make('email_verifed_at')
                                    ->helperText('Verificação de email de usuário.')->label('E-mail verificado'),
                            ])->columnSpan(2),
                        ])->columnSpanFull(),

                    ])->columnSpan(6)
                ]),


                Tabs::make('informations')->tabs([


                    Tab::make('Meu Canal')->icon('heroicon-m-identification')->schema([
                        Grid::make(8)
                            ->relationship('channel')
                            ->schema([
                                FileUpload::make('brand')
                                    ->label('')
                                    ->helperText('Envie a logo do seu canal. Formatos aceitos: JPG, PNG ou AVIF (máx. 1MB).')
                                    ->disk('public')
                                    ->directory('channel_brand')
                                    ->visibility('public')
                                    ->default('default-brand.png')
                                    ->panelLayout('integrated')
                                    ->openable()
                                    ->required()
                                    ->validationMessages([
                                        'required' => 'Envie uma imagem ou mantenha a padrão do canal.',
                                    ])
                                    ->image()
                                    ->loadingIndicatorPosition('left')
                                    ->uploadButtonPosition('left')
                                    ->removeUploadedFileButtonPosition('right')
                                    ->uploadProgressIndicatorPosition('left')
                                    ->maxSize(1024)
                                    ->imageEditor()
                                    ->acceptedFileTypes(['image/jpeg', 'image/png', 'image/jpg', 'image/avif'])
                                    ->preserveFilenames()
                                    ->dehydrateStateUsing(fn ($state) => $state)
                                    ->columnSpan(2),

                                Group::make()->schema([
                                    Grid::make(4)->schema([
                                        Group::make()->schema([
                                            TextInput::make('title')
                                                ->label('Canal')
                                                ->hintIcon('heroicon-m-check-badge', tooltip: 'Seu canal do Youtube.')
                                                ->hintColor(Color::Green)
                                                ->required()
                                                ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                                ->rule(['min:2', 'max:150'])
                                                ->validationMessages([
                                                    'required'  => 'O nome do canal é obrigatório',
                                                    'min'       => 'O nome deve ter pelo menos :min caracteres',
                                                    'max'       => 'O nome não pode ter mais de :max caracteres',
                                                ])
                                                ->helperText(fn($get) => $get('title_error') ?? 'Informe o nome do seu Canal.')
                                                ->live(onBlur: true),

                                        ])->columnSpan(2),

                                        Group::make()->schema([
                                            TextInput::make('name')
                                                ->label('Nome ou nick')
                                                ->required()
                                                ->rule(['min:2', 'max:150'])
                                                ->validationMessages([
                                                    'required'  => 'O nome ou nick é obrigatório',
                                                    'min'       => 'O nome deve ter pelo menos :min caracteres',
                                                    'max'       => 'O nome não pode ter mais de :max caracteres',
                                                ])
                                                ->helperText(fn($get) => $get('nick_error') ?? 'Informe seu nome ou nick name.')
                                                ->live(onBlur: true),
                                        ])->columnSpan(2),
                                    ])->columnSpanFull(),


                                    Grid::make(4)->schema([
                                        Group::make()->schema([
                                            TextInput::make('link')
                                                ->label('Canal do YouTube')
                                                ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Digite apenas o nome do canal, sem incluir o "@" ou o link completo.')
                                                ->hintColor(Color::Yellow)
                                                ->prefix('https://www.youtube.com/@')
                                                ->suffixIcon('heroicon-m-globe-alt')
                                                ->required()
                                                ->rules([
                                                    'min:2',
                                                    'max:150',

                                                ])
                                                ->validationMessages([
                                                    'required' => 'O link do canal é obrigatório.',
                                                    'min' => 'O link deve ter pelo menos :min caracteres.',
                                                    'max' => 'O link não pode ter mais de :max caracteres.',
                                                    'regex' => 'Use apenas letras, números e os símbolos ".", "-", "_".',
                                                ])
                                                ->helperText('Informe apenas o identificador do canal, sem "@" nem espaços. Ex: "MeuCanal123".')
                                                ->live(onBlur: true)
                                                ->afterStateUpdated(function (callable $set, $state){
                                                    $username = str($state)
                                                        ->remove(['https://www.youtube.com/', '@'])
                                                        ->trim();

                                                    $set('link', $username);
                                                }),
                                        ])->columnSpan(3),

                                        Group::make()->schema([
                                            ColorPicker::make('color')
                                                ->label('Cor base do canal')
                                                ->hintIcon('heroicon-m-swatch', tooltip: 'Selecione a cor principal do seu canal. Ela será usada em botões, banners e destaques.')
                                                ->hintColor('info')
                                                ->required()
                                                ->default('#ff0000')
                                                ->rgb()
                                                ->helperText('Identidade visual do canal.')
                                                ->columnSpanFull()
                                                ->reactive()
                                                ->live(onBlur: true)
                                                ->afterStateUpdated(function ($state, callable $set) {
                                                    if (is_string($state) && !str_starts_with($state, '#')) {
                                                        $set('color', '#' . ltrim($state, '#'));
                                                    }
                                                }),
                                        ])->columnSpan(1),
                                    ])->columnSpanFull(),

                                    Textarea::make('description')
                                        ->label('Descrição do canal')
                                        ->placeholder('Ex: Canal dedicado a reviews de jogos retrô e curiosidades do mundo gamer.')
                                        ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Descreva brevemente sobre o conteúdo do seu canal. Isso ajuda outros usuários a entenderem seu foco.')
                                        ->hintColor('info')
                                        ->rows(8)
                                        ->maxLength(300)
                                        ->reactive()
                                        ->helperText(function ($get) {
                                            $length = strlen((string) $get('description'));
                                            return "Limite: {$length}/300 caracteres.";
                                        })
                                        ->validationMessages([
                                            'required' => 'A descrição é obrigatória.',
                                            'max' => 'A descrição não pode ter mais de :max caracteres.',
                                        ])
                                        ->live(onBlur: true)
        ,

                                ])->columnSpan(6),
                            ]),


                    ]),

                    Tab::make('Campanha')
                        ->schema([
                            TextInput::make('channel.camping.title')
                                ->label('Título da Campanha')
                                ->placeholder('Digite o título da campanha')
                                ->maxLength(100),
                            Textarea::make('channel.camping.description')
                                ->label('Descrição')
                                ->rows(4)
                                ->maxLength(300),
                            TextInput::make('channel.camping.link')
                                ->label('Link ou URL da Campanha')
                                ->placeholder('https://...'),
                            FileUpload::make('channel.camping.image')
                                ->label('Imagem da Campanha')
                                ->directory('camping_images')
                                ->image()
                                ->helperText('Envie uma imagem para a campanha'),
                        ]),

                ])->persistTab(),


            ])->columns([
                'default' => 1,
                'sm' => 1,
                'md' => 1,
                'lg' => 2,
                'xl' => 1,
                '2xl' => 1
            ]);
    }

    public static function passwordHelper($get, string $operation): string
    {
        $password = $get('password');
        $strength = $get('password_strength');

        if (filled($password)) {
            return match ($strength) {
                'Forte' => '✅ Senha forte!',
                'Fraca' => '❌ Senha fraca — inclua letra maiúscula, número e símbolo.',
                default => 'A senha deve conter pelo menos uma letra maiúscula, um número e um caractere especial.',
            };
        }

        return $operation === 'edit'
            ? 'Preencha apenas se desejar alterar a senha.'
            : 'A senha deve conter pelo menos uma letra maiúscula, um número e um caractere especial.';

    }

    public static function validateCaracteres(int $min, int $max): void
    {
        Notification::make()
            ->title('Quantidade de caracteres invalidos!')
            ->body('O nome deve ter entre ' . $min . ' e ' . $max . ' caracteres.')
            ->danger()
            ->send();
    }

    public static function validateEmaildatabase(string $email): bool
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
}
