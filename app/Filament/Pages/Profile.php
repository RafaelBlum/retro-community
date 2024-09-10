<?php

namespace App\Filament\Pages;

use App\Enums\PanelTypeEnum;
use App\Models\User;
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
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

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

                    Section::make()->schema([
                        FileUpload::make('avatar')
                            ->label('')
                            ->default('default.jpg')
                            ->disk('public')
                            ->directory('thumbnails')
                            ->columnSpanFull()
                    ])->columnSpan(3),

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

                    ])->columnSpan(6),

                    Grid::make(8)->relationship('channel')->schema([

                        Section::make()->schema([
                            FileUpload::make('brand')
                                ->label('')
                                ->disk('public')
                                ->debounce()
                                ->helperText('Logo do seu canal')
                                ->directory('channel_brand')
                                ->columnSpanFull()
                        ])->columnSpan(3),

                        Section::make()->schema([
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
                                    ColorPicker::make('color'),
                                ])->columnSpan(1),
                            ])->columnSpanFull(),

                            Textarea::make('description')
                                ->label('Descrição')
                                ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Descreva brevemente aqui sobre seu canal.')
                                ->hintColor(Color::Yellow)
                                ->maxLength(255),
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
                                    ->columnSpanFull()
                            ])->columnSpan(3),

                            Section::make()->schema([
                                Grid::make(10)->schema([
                                    Group::make()->schema([
                                        Placeholder::make('qrCode')
                                            ->label('QR Code LivePix')
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
                                    ])->columnSpan(4)->hidden(function (Get $get) {
                                        if ($get('qrCode') === null) {
                                            return true;
                                        }
                                        return false;
                                    }),

                                    Group::make()->schema([

                                        TextInput::make('title')
                                            ->label('Titulo')
                                            ->required()
                                            ->maxLength(255),
                                        Textarea::make('content')
                                            ->label('Descrição da campanha')
                                            ->required()
                                            ->columnSpanFull(),

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
//        $user = auth()->user()->load('channel.camping');
//        $user2 = User::find(\auth()->user()->id);
//        $brandImagem = $user2->channel->brand;
        //dd($brandImagem);

        auth()->user()->load('channel.camping')->update(
            $this->form->getState()
        );

        //dd($brandImagem, $user->channel->brand, $user2->channel, $this->form->model->channel->brand);

        Notification::make()
            ->title('Perfil atualizado com sucesso!!')
            ->body(\auth()->user()->name)
            ->success()
            ->send();
    }
}
