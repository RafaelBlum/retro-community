<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Str;

class Channel extends Model
{
    use HasFactory;

    protected $fillable = [
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

    protected static function booted()
    {
        static::saving(function ($channel){
            $channel->slug = Str::slug($channel->title) . '-' . now()->format('YmdHis'). $channel->id;
        });
    }
}
