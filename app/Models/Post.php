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
        'id',
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

    protected $casts = [
        'published_at' => 'date',
        'scheduled_for' => 'date',
        'status' => StatusPostEnum::class
    ];

    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    protected static function booted()
    {
        static::saving(function ($post){
            $post->slug = Str::slug($post->title) . '-' . now()->format('YmdHis'). $post->id;
        });
    }
}
