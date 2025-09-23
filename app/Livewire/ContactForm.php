<?php

namespace App\Livewire;

use Filament\Schemas\Schema;
use Filament\Schemas\Components\Actions;
use Filament\Actions\Action;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Pages\SimplePage;
use Livewire\Component;

class ContactForm extends SimplePage
{
    public array $data = [];

    protected string $view = 'livewire.contact-form';

    public function mount(): void
    {
        $this->form->fill();
    }

    public function form(Schema $schema): Schema
    {
        return $schema->components([
            TextInput::make('name')
            ->required(),
            TextInput::make('email' )
            ->email()
            ->required(),
            Textarea::make('message')
            ->required()
            ->rows(5),

            Actions::make([
                Action::make('submit')
                    ->submit('send'),

                Action::make('back')
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
