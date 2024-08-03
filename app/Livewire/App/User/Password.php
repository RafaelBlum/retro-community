<?php

namespace App\Livewire\App\User;

use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Notifications\Notification;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Password extends Component implements HasForms
{
    use InteractsWithForms;

    public $state = [
        'current_password' => '',
        'password' => '',
        'password_confirmation' => '',
    ];


    public function Form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('current_password')
                ->label('Recent Password')
                ->password()
                ->rules(['current_password:web'])
                ->required(),





            Grid::make(4)->schema([
                Group::make()->schema([
                    TextInput::make('password')
                        ->label('New Password')
                        ->password()
//                ->regex('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).*$/i')
                        ->minLength(8)
                        ->required()
                        ->same('password_confirmation'),
                ])->columnSpan(function (Get $get, Set $set) {
                    if( $get('password') === null){
                        return 4;
                    }else{
                        return 2;
                    }
                }),

                Group::make()->schema([
                    TextInput::make('password_confirmation')
                        ->label('Confirm New Password')
                        ->password()
//                ->regex('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[^\w\s]).*$/i')
                        ->minLength(8)
                        ->required()
                        ->same('password'),
                ])->columnSpan(2),
            ])->columnSpanFull(),

        ])->statePath('state');
    }

    public function save(): void
    {
        $this->resetErrorBag();
        $this->validate();

        if(session() !== null)
        {
            session()->put([
                'password_hash_'.Auth::getDefaultDriver() => Auth::user()?->getAuthPassword(),
            ]);
        }

        /** @var \App\Models\User $user */
        $user = Auth::user();

        $user->forceFill([
            'password' => Hash::make($this->state['password'])
        ])->save();

        $this->state = [
            'current_password' => '',
            'password' => '',
            'password_confirmation' => '',
        ];

        Notification::make()->success()->title('Senha atualizada com sucesso!!')->send();
    }

    public function getUserProperty(): ?Authenticatable
    {
        return Auth::user();
    }


    public function render()
    {
        return view('livewire.app.user.password');
    }
}
