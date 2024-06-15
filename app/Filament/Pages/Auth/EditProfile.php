<?php

namespace App\Filament\Pages\Auth;

use App\Enums\MaritalStatusEnum;
use Filament\Actions\Action;
use Filament\Facades\Filament;
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
use Illuminate\Database\Eloquent\Model;

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
