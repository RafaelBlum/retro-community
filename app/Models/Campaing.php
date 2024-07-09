<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Campaing extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'channel_id'];

    protected $fillable = [
        'title',
        'content',
        'channel_id',
        'linkGoal',
        'qrCode',
        'camping',
        'image',
    ];

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }
}
