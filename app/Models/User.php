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
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements HasAvatar, FilamentUser
{
    use HasFactory, Notifiable;

    protected $guarded = ['id'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'panel',
        'avatar'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
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

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
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
        if ($this->panel === PanelTypeEnum::APP && $panel->getId() === PanelTypeEnum::ADMIN->value) {

            return false;
        }
        return true;

    }
}
