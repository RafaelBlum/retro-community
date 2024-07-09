<?php

namespace App\Filament\Pages\Auth;

use App\Enums\MaritalStatusEnum;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Facades\Filament;
use Filament\Forms\Components\ColorPicker;
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
use Filament\Pages\Auth\EditProfile as BaseEditProfile;
use Filament\Pages\Page;
use Filament\Support\Colors\Color;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EditProfile extends BaseEditProfile
{
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static string $view = 'filament.pages.auth.edit-profile';

    protected static string $layout = 'filament-panels::components.layout.index';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(3)
                    ->schema([

                        Section::make()
                            ->schema([
                                FileUpload::make('avatar')
                                    ->label('')
                                    ->disk('public')
                                    ->directory('thumbnails'),
                            ])
                            ->columnSpan(1),

                        Section::make()
                            ->schema([

                                Grid::make(4)->schema([
                                    Group::make()->schema([
                                        $this->getNameFormComponent()->autofocus(),
                                    ])->columnSpan(2),

                                    Group::make()->schema([
                                        $this->getEmailFormComponent(),
                                    ])->columnSpan(2),
                                ])->columnSpanFull(),

                                Grid::make(4)->schema([
                                    Group::make()->schema([
                                        $this->getPasswordFormComponent(),
                                    ])->columnSpan(function (Get $get, Set $set) {
                                        if( $get('password') == null){
                                            return 4;
                                        }else{
                                            return 2;
                                        }
                                    }),

                                    Group::make()->schema([
                                        $this->getPasswordConfirmationFormComponent(),
                                    ])->columnSpan(2),
                                ])->columnSpanFull(),




                            ])
                            ->columnSpan(2),

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

                                        TextInput::make('qrCode')
                                            ->label('Link livePix do seu canal')
                                            ->hintIcon('heroicon-m-question-mark-circle', tooltip: 'Cole a URL do seu livePix, caso queira deixa fixado na página do seu canal')
                                            ->hintColor(Color::Yellow)
                                            ->suffixIcon('heroicon-m-qr-code'),
                                        Select::make('channel_id')
                                            ->relationship('camping', 'title')
                                            ->searchable()
                                            ->preload()
                                            ->createOptionForm([

                                            ])
                                            ->required()
                                    ])->columnSpan(7),
                                ]),
                            ]),
                            Tab::make('Minha campanha')->icon('heroicon-m-banknotes')->schema([

                            ]),
                        ])->columnSpanFull()->activeTab(1)->persistTabInQueryString(),
                    ]),
            ])->statePath('data')->columns([
                'default' => 2,
                'sm' => 1,
                'md' => 2,
                'lg' => 2,
                'xl' => 2,
                '2xl' => 2
            ]);
    }

    protected function hasFullWidthFormActions(): bool
    {
        return false;
    }

    protected function afterSave()
    {
        $user = User::with('channel')->findOrFail($this->data['id']);
        $channel = $user->channel;
        $user->channel->slug = Str::slug($this->data['channel']['link']) . '-' . $this->data['id'];
        $user->channel()->save($channel);
    }

    public static function getSlug(): string
    {
        return static::$slug ?? 'perfil';
    }

    protected function getFormActions(): array
    {
        return [
            Action::make('Salvar')
                ->color('primary')
                ->submit('Update'),

            Action::make('Limpar meus dados')
                ->action(function () {
                    $this->reset('data.name', 'data.password', 'data.email');

                    Notification::make()
                        ->title('Limpeza dos meus dados realizado com sucesso!!')
                        ->success()
                        ->send();
                })
                ->requiresConfirmation()
                ->modalHeading('Limpar dados')
                ->modalDescription('Tem certeza de que deseja limpar seus dados?')
                ->modalSubmitActionLabel('Sim, limpar!'),

            Action::make('Cancelar e sair')
                ->color('info')
                ->button()
                ->url(route('filament.admin.pages.dashboard'), shouldOpenInNewTab: false),
        ];
    }

    public function update()
    {
        dd('asdas');
        auth()->user()->update(
            $this->form->getState()
        );

        Notification::make()
            ->title('Perfil atualizado com sucesso!')
            ->success()
            ->send();
    }
}
