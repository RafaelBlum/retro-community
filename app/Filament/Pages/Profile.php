<?php

namespace App\Filament\Pages;

use App\Enums\PanelTypeEnum;
use App\Models\Campaing;
use App\Models\User;
use Closure;
use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;
use Livewire\Features\SupportFileUploads\TemporaryUploadedFile;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Meu Perfil';

    protected static string $view = 'filament.pages.profile';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(
            auth()->user()->load('channel.camping')->attributesToArray()
        );
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(9)->schema([

                    FileUpload::make('avatar')
                        ->label('')
                        ->default('default.jpg')
                        ->disk('public')
                        ->directory('thumbnails')
                        ->removeUploadedFileButtonPosition('right')
                        ->openable()
                        ->columnSpan(3),

                    Section::make()->schema([
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
                                            $this->validateCaracteres(2, 255);
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

                                        if(!$this->validateEmaildatabase($state))
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
                                    ->native(false)
                                    ->rules([
                                        fn(): Closure => function (string $attribute, $value, Closure $fail) {
                                            if (empty($value)) {
                                                $fail('Precisa definir o seu tipo de usuário, por favor.');
                                            }
                                        },
                                    ])
                                    ->required(),

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
                        ]),

                    ])->columnSpan(6),

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
                            ->columnSpan(3),

                        Section::make()->schema([
                            Grid::make(4)->schema([
                                Group::make()->schema([

                                    TextInput::make('title')
                                        ->label('Nome do seu canal')
                                        ->hintIcon('heroicon-m-check-badge', tooltip: 'Seu canal do Youtube.')
                                        ->hintColor(Color::Green)
                                        ->minLength(2)
                                        ->maxLength(255)
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, $set) {
                                            if (strlen($state) < 2 || strlen($state) > 255) {
                                                $this->validateCaracteres(2, 255);
                                            }
                                        })
                                        ->required(),

                                    TextInput::make('slug')->disabled()->label(""),

                                ])->columnSpan(2),

                                Group::make()->schema([
                                    TextInput::make('name')
                                        ->label('Seu nome')
                                        ->minLength(2)
                                        ->maxLength(255)
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, $set) {
                                            if (strlen($state) < 2 || strlen($state) > 255) {
                                                $this->validateCaracteres(2, 255);
                                            }
                                        })
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
                                        ->minLength(2)
                                        ->maxLength(255)
                                        ->reactive()
                                        ->afterStateUpdated(function ($state, $set) {
                                            if (strlen($state) < 2 || strlen($state) > 255) {
                                                $this->validateCaracteres(2, 255);
                                            }
                                        })
                                        ->required(),
                                ])->columnSpan(3),

                                Group::make()->schema([
                                    ColorPicker::make('color'),
                                ])->columnSpan(1),
                            ])->columnSpanFull(),

                            Textarea::make('description')
                                ->label('Descrição')
                                ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Descreva brevemente aqui sobre seu canal.')
                                ->hintColor(Color::Yellow)
                                ->required(),
                        ])->columnSpan(5),


                        Grid::make(8)->relationship('camping')->schema([
                            Section::make()->schema([
                                FileUpload::make('image')
                                    ->label('')
                                    ->disk('public')
                                    ->debounce()
                                    ->helperText('Imagem da sua campanha, informativa.')
                                    ->directory('campaing_folder')
                                    ->image()
                                    ->imagePreviewHeight('250')
                                    ->loadingIndicatorPosition('left')
                                    ->panelAspectRatio('1:1')
                                    ->panelLayout('integrated')
                                    ->removeUploadedFileButtonPosition('right')
                                    ->uploadButtonPosition('left')
                                    ->uploadProgressIndicatorPosition('left')
                                    ->openable()
                                    ->uploadingMessage('Uploading attachment...')
                                    ->columnSpanFull()
                            ])->columnSpan(3),

                            Section::make()->schema([
                                Grid::make(10)->schema([
                                    Group::make()->schema([
                                        Placeholder::make('qrCode')
                                            ->label('QR Code LivePix')
                                            ->content(function (Campaing $record) {

                                                if (is_null($record)) {
                                                    return 'Nenhum QR Code selecionado';
                                                }

                                                return new HtmlString(
                                                    view('filament.campaing.iframe', ['state' => $record])->render()
                                                );
                                            }),
                                    ])->columnSpan(4)->hidden(function (Get $get) {
                                        if ($get('qrCode') === null) {
                                            return true;
                                        }
                                        return false;
                                    }),

                                    Group::make()->schema([

                                        TextInput::make('title')
                                            ->label('Titulo')
                                            ->minLength(2)
                                            ->maxLength(255)
                                            ->reactive()
                                            ->afterStateUpdated(function ($state, $set) {
                                                if (strlen($state) < 2 || strlen($state) > 255) {
                                                    $this->validateCaracteres(2, 255);
                                                }
                                            })
                                            ->required(),

                                        Textarea::make('content')
                                            ->label('Descrição da campanha')
                                            ->required()
                                            ->columnSpanFull(),

                                        TextInput::make('linkGoal')
                                            ->label('Link campanha status')
                                            ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Adicione o link da campanha do seu LivePix')
                                            ->hintColor(Color::Yellow)
                                            ->prefixIcon('heroicon-m-currency-dollar')->suffixIcon('heroicon-m-chart-bar')
                                            ->url()
                                            ->reactive()
                                            ->afterStateUpdated(function ($state){
                                                if (!filter_var($state, FILTER_VALIDATE_URL) && !empty($state)) {
                                                    Notification::make()
                                                        ->title('URL inválida')
                                                        ->body('O link inserido não é uma URL válida. Verifique e tente novamente.')
                                                        ->danger()
                                                        ->send();
                                                }
                                            })
                                            ->required(),

                                        TextInput::make('qrCode')
                                            ->label('Link QR Code')
                                            ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Adicione o link do seu QRCODE do livePix')
                                            ->hintColor(Color::Yellow)
                                            ->prefixIcon('heroicon-m-qr-code')->suffixIcon('heroicon-m-viewfinder-circle')
                                            ->url()
                                            ->reactive()
                                            ->afterStateUpdated(function ($state){
                                                if (!filter_var($state, FILTER_VALIDATE_URL) && !empty($state)) {
                                                    Notification::make()
                                                        ->title('URL inválida')
                                                        ->body('O link inserido não é uma URL válida. Verifique e tente novamente.')
                                                        ->danger()
                                                        ->send();
                                                }
                                            })
                                            ->required(),


                                        Toggle::make('camping')
                                            ->label(function (Get $get){
                                                if($get('camping') == true){
                                                    return 'Campanha ativada';
                                                }
                                                return 'Campanha desativada';
                                            })->live(),
                                    ])->columnSpan(function (Get $get) {
                                        if ($get('qrCode') === null && !array_key_exists('id', $this->data['channel']['camping'])) {
                                            return 10;
                                        }
                                        return 6;
                                    }),
                                ])->columnSpanFull(),
                            ])->columnSpan(5),
                        ]),



                    ]),

                ]),
            ])
            ->statePath('data')
            ->model(auth()->user())
            ->columns([
                'default' => 2,
                'sm' => 1,
                'md' => 2,
                'lg' => 2,
                'xl' => 2,
                '2xl' => 2
            ]);
    }

    protected function validateCaracteres(int $min, int $max): void
    {
        Notification::make()
            ->title('Erro de validação')
            ->body('O nome deve ter entre ' . $min . ' e ' . $max .' caracteres.')
            ->danger()
            ->send();
    }

    protected function validateEmaildatabase(string $email):bool
    {
        return !User::where('email', $email)->exists();
    }

    protected function onValidationError(ValidationException $exception): void
    {
        Notification::make()
            ->title($exception->getMessage())
            ->danger()
            ->send();
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('Salvar modificações')
                ->color('primary')
                ->submit('update'),
        ];
    }

    public function update()
    {
        $user = auth()->user()->load('channel.camping');

        $oldImageAvatar = $user->avatar;
        $oldImageChannel = $user->channel->brand;
        $oldImageCamping = $user->channel->camping->image;

        auth()->user()->load('channel.camping')->update($this->form->getState());

        $user->channel->slug = Str::slug($this->data['channel']['title'] . '-' . $this->data['id']);
        $user->channel->save();

        $user->save();

        auth()->user()->load('channel.camping')->update(
            $this->form->getState()
        );

        if($user->avatar != $oldImageAvatar)
        {
            if($user->avatar != "default-post.jpg"){
                Storage::delete('public/' . $oldImageAvatar);
            }
        }

        if($user->channel->brand != $oldImageChannel){
            if($user->channel->brand != "default-brand.png"){
                Storage::delete('public/' . $oldImageChannel);
            }
        }

        if($user->channel->camping->image != $oldImageCamping){
                Storage::delete('public/' . $oldImageCamping);
        }

        Notification::make()
            ->title('Perfil atualizado com sucesso!!')
            ->body(\auth()->user()->name)
            ->success()
            ->send();
    }
}
