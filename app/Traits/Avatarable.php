<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

trait Avatarable
{
    public function updatedAvatar(UploadedFile $photo): void
    {
        tap($this->avatar, function ($prev) use ($photo){
           $this->forceFill([
               'avatar' => $photo->storePublicly('avatar', ['disk' => 'public'],)
           ])->save();

            if ($prev) {
                Storage::disk('public')->delete($prev);
            }
        });
    }

    public function deleteAvatar(): void
    {
        Storage::disk('public')->delete($this->avatar);
        $this->forceFill(['avatar' => null])->save();
    }

    public function avatarUrl(): Attribute
    {
        return Attribute::get(function () {
            /** @var \Illuminate\Filesystem\FilesystemManager $disk */
            $disk = Storage::disk('public');

            return $this->avatar ? $disk->url($this->avatar) : $this->defaultAvatarUrl();
        });
    }

    protected function defaultAvatarUrl(): string
    {
        return asset('storage/default-avatar.png');
    }

}
