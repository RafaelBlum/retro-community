<?php
declare(strict_types=1);

namespace App\Models;

use App\Enums\StatusPostEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
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

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'scheduled_for' => 'datetime',
            'status' => StatusPostEnum::class,
            'views' => 'integer',
        ];
    }

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        static::saving(function ($post){
            if(empty($post->slug) || $post->isDirty('title'))
            {
                $post->slug = Str::slug($post->title) . '-' . now()->format('YmdHis');
            }
        });
    }
}
