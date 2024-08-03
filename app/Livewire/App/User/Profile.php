<?php

namespace App\Livewire\App\User;

use App\Enums\PanelTypeEnum;
use App\Filament\Pages\App\Profile as ProfilePage;
use App\Models\User;
use Filament\Forms\Components\ColorPicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Tabs\Tab;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Support\Colors\Color;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Unique;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component implements HasForms
{
    use InteractsWithForms;
    use WithFileUploads;

    public ?array $state = [];

    public $photo;

    /** @var \App\Models\User $user*/
    public $user;

    public function mount(): void
    {
        //$this->user = User::with('channel')->find(Auth::user()->id);
        $this->user = Auth::user();
        $this->state = $this->user?->withoutRelations()->toArray();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
                ->label('Nome')
                ->required()
                ->maxLength(255),

            TextInput::make('email')
                ->label('Email')
                ->email()
                ->unique(User::class, 'email', modifyRuleUsing: function (Unique $rule) {
                    return $rule->whereNot('id', auth()->user()->id);
                })
                ->required()
                ->maxLength(255),

            Select::make('panel')
                ->label('Tipo de usuário')
                ->options(PanelTypeEnum::class)
                ->native(false),

            Tabs::make('informations')->tabs([

                Tab::make('Meu Canal')->icon('heroicon-m-identification')->schema([

                ]),
            ])->columnSpanFull()->activeTab(1)->persistTabInQueryString(),

        ])->statePath('state');
    }

    public function save(): void
    {
        $this->resetErrorBag();
        $this->validate();

        if (isset($this->photo)) {
            $this->user->updatedAvatar($this->photo);
        }

        $this->user->forceFill([
            'channel.name' => $this->state['name'],
            'channel.title' => $this->state['title'],
            'email' => $this->state['email'],
            'name' => $this->state['name'],
        ])->save();

        if (isset($this->photo)) {
            redirect(ProfilePage::getUrl());
        }

        Notification::make()->success()->title('Perfil modificado com sucesso!!')->send();
    }

    public function deleteAvatar(): void
    {
        $this->user?->deleteAvatar();
        redirect(ProfilePage::getUrl());
    }

    public function getUserProperty(): ?Authenticatable
    {
        return Auth::user();
    }


    public function render()
    {
        return view('livewire.app.user.profile');
    }
}
