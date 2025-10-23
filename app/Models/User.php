<?php
declare(strict_types=1);

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\PanelTypeEnum;
use Filament\Models\Contracts\FilamentUser;
use Filament\Models\Contracts\HasAvatar;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasAvatar, FilamentUser
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'panel',
        'avatar'
    ];

    protected $hidden = ['password', 'remember_token'];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'panel' => PanelTypeEnum::class,
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }

    public function channel(): HasOne
    {
        return $this->hasOne(Channel::class);
    }

    public function channelCamping(): HasOne
    {
        return $this->hasOne(Channel::class)->with('camping');
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'panel' => PanelTypeEnum::class,
        ];
    }

    public function getFilamentAvatarUrl(): ?string
    {
        return asset('storage/' . $this->avatar);
    }

    public function canAccessPanel(Panel $panel): bool
    {
        if ($this->panel === PanelTypeEnum::APP && $panel->getId() === PanelTypeEnum::ADMIN->value)
        {
            return false;
        }
        
        return true;

    }
}
