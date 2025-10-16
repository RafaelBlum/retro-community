<?php

namespace App\Filament\Resources\Users\Tables;

use App\Filament\Resources\Users\UserResource;
use App\Models\User;
use Filament\Actions\Action;
use Filament\Actions\ActionGroup;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteAction;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Storage;

class UsersTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar')
                    ->imageHeight(40)
                    ->disk('public')
                    ->circular(),

                TextColumn::make('name')
                    ->label('Nome')
                    ->description(fn(User $record) => $record->email)
                    ->searchable(),

                ImageColumn::make('channel.brand')
                    ->circular()
                    ->disk('public')
                    ->stacked()
                    ->limit(3),

                TextColumn::make('channel.title')
                    ->label('Canal')->description(function (User $record){
                        return $record->channel->name;
                    }),

                TextColumn::make('panel')
                    ->label('Acesso')
                    ->searchable()
                    ->badge(),

                TextColumn::make('posts_count')
                    ->counts('posts')
                    ->label('Publicações'),

            ])
            ->filters([
                Filter::make('has_posts')
                    ->label('Usuários com postagens')
                    ->toggle()
                    ->query(fn(Builder $query): Builder => $query->whereHas('posts'))
            ])
            ->filtersTriggerAction(
                fn(Action $action) => $action
                    ->link()
                    ->icon('heroicon-m-magnifying-glass-circle')
                    ->label('Filtros'),
            )
            ->recordActions([
                ActionGroup::make([
                    EditAction::make(),
                    DeleteAction::make()
                        ->action(function (User $record) {
                            if ($record->avatar != 'default.jpg') {
                                Storage::delete('public/' . $record->avatar);
                            }
                            $record->delete();
                        })
                        ->requiresConfirmation()
                        ->modalHeading('Deletar ' . UserResource::getModelLabel())
                        ->modalDescription('Tem certeza de que deseja excluir este ' . UserResource::getModelLabel() . '? Isto não pode ser desfeito.')
                        ->modalSubmitActionLabel('Sim, deletar!'),
                    ViewAction::make(),
                ])->tooltip("Menu")
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
