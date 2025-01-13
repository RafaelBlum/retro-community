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

    protected $guarded = ['id'];

    protected $fillable = [
        'title',
        'slug',
        'user_id',
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
        return $this->hasOne(Campaing::class);
    }
}
