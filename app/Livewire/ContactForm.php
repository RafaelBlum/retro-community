<?php

namespace App\Livewire;

use Filament\Actions\Action;
use Filament\Forms\Components\Actions;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Pages\SimplePage;
use Livewire\Component;

class ContactForm extends SimplePage
{
    public array $data = [];

    protected static string $view = 'livewire.contact-form';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Form $form): Form
    {
        return $form->schema([
            TextInput::make('name')
            ->required(),
            TextInput::make('email' )
            ->email()
            ->required(),
            Textarea::make('message')
            ->required()
            ->rows(5),

            Actions::make([
                Actions\Action::make('submit')
                    ->submit('send'),

                Actions\Action::make('back')
                    ->label('Voltar login')
                    ->link()
                    ->url(filament()->getLoginUrl()),
            ]),
        ])
            ->statePath('data');
    }

    public function send(): void
    {
        dd($this->form->getState());
    }
}
