<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'title',
        'slug',
        'name',
        'description',
        'link',
        'brand',
        'color'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function camping(): HasOne
    {
        return $this->hasOne(Campaign::class);
    }

    public function followers(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'channel_follower')->withTimestamps();
    }
    public function getFilamentAvatarUrl(): ?string
    {
        return asset('storage/' . $this->brand);
    }

    protected static function booted()
    {
        static::saving(function ($channel) {
            if ($channel->isDirty('title') || !$channel->slug) {
                $channel->slug = Str::slug($channel->title) . '-' . now()->format('YmdHis');
            }
        });
    }
}
