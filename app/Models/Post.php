<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    protected $casts = [
        'published_at' => 'date',
        'scheduled_for' => 'date'
    ];

    protected $fillable = [
        'id',
        'user_id',
        'category_id',
        'title',
        'slug',
        'subTitle',
        'summary',
        'content',
        'published_at',
        'scheduled_for',
        'status',
        'views',
        'featured_image_url'
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
