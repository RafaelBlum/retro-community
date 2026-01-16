<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Campaign extends Model
{
    use HasFactory;

    protected $fillable = [
        'channel_id',
        'title',
        'content',
        'goal_link',
        'qr_code',
        'pix_page_link',
        'is_active',
        'image',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }

    public function getImageUrl(): ?string
    {
        return $this->image ? asset('storage/' . $this->image) : null;
    }

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }
}
