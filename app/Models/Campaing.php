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
        'linkPagePix',
        'camping',
        'image',
    ];

    protected $casts = [
        'camping' => 'boolean',
    ];

    public function channel(): BelongsTo
    {
        return $this->belongsTo(Channel::class);
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($campaign) {
            if ($campaign->camping) {

                // Desativa todas as outras campanhas do canal antes de ativar a nova
                static::where('channel_id', $campaign->channel_id)
                    ->where('id', '!=', $campaign->id)
                    ->update(['camping' => false]);

                $camp = Campaing::where('channel_id', $campaign->channel_id)->where('id', '!=', $campaign->id)->update(['camping' => false]);

//                dd("boot", static::where('channel_id', $campaign->channel_id)
//                    ->where('id', '!=', $campaign->id)
//                    ->update(['camping' => false]), $camp);
            }
        });
    }
}
