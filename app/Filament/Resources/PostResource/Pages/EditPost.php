<?php

namespace App\Filament\Resources\PostResource\Pages;

use App\Filament\Resources\PostResource;
use App\Models\Post;
use Filament\Actions;
use Filament\Notifications\Notification;
use Filament\Resources\Pages\EditRecord;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class EditPost extends EditRecord
{
    protected static string $resource = PostResource::class;

    protected static ?int $navigationSort = 2;

    protected static ?string $navigationLabel = "Editar Post";

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()
                ->action(function(Post $record) {
                    if($record->featured_image_url !== 'default-post.jpg'){
                        Storage::delete('public/' . $record->featured_image_url);
                    }
                    $record->delete();
                })
                ->requiresConfirmation()
                ->modalHeading('Deletar Post')
                ->modalDescription('Tem certeza de que deseja excluir este post? Isto não pode ser desfeito.')
                ->modalSubmitActionLabel('Sim, deletar!'),
        ];
    }

    protected function beforeSave()
    {
        $post = Post::find($this->data['id']);
        $caminhoDaImagem = array_values($this->data['featured_image_url'])[0];

        if($post->featured_image_url != $caminhoDaImagem){
            if($post->featured_image_url != 'default-post.jpg'){
                Storage::delete('public/' . $post->featured_image_url);
            }
        }
    }

    protected function afterSave()
    {
        $post = Post::find($this->data['id']);
        $post->slug = Str::slug($this->data['title']);
        $post->save();
    }
}
