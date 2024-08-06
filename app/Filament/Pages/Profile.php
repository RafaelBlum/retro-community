<?php

namespace App\Filament\Pages;

use App\Enums\PanelTypeEnum;
use Filament\Actions\Action;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;
use Filament\Actions;
use Filament\Support\Colors\Color;
use Illuminate\Support\Facades\Auth;

class Profile extends Page implements HasForms
{
    use InteractsWithForms;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static bool $shouldRegisterNavigation = false;

    protected static ?string $title = 'Update Profile';

    protected static string $view = 'filament.pages.profile';

    public ?array $data = [];

    public function mount(): void
    {
        $this->form->fill(
            auth()->user()->attributesToArray()
        );
    }

    protected function getViewData(): array
    {
        return [
            'user' => Auth::user(),
        ];
    }

    public function form(Form $form): Form
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
                                            ColorPicker::make('Cor'),
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
                        Tab::make('Minha campanha')->icon('heroicon-m-identification')->schema([

                        ]),
                    ])->columnSpanFull()->activeTab(1)->persistTabInQueryString(),
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

    protected function getFormActions(): array
    {
        return [
            Action::make('Update')
                ->color('primary')
                ->submit('Update'),
        ];
    }

    public function update()
    {

        auth()->user()->load('channel')->update(
            $this->form->getState()
        );

        Notification::make()
            ->title('Profile updated!')
            ->success()
            ->send();
    }
}
