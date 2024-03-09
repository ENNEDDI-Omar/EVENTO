<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Event extends Model implements HasMedia
{
    use HasFactory, SoftDeletes, InteractsWithMedia;

    protected $fillable = [
        'organisator_id',
        'category_id',
        'title',
        'description',
        'location',
        'date',
        'capacity',
        'available_seats',
        'event_status',
        'reservation_type',
        'price',
    ];

    public function organisator(): BelongsTo
    {
        return $this->belongsTo(Organisator::class);
    }

    public function reservations(): HasMany
    {
        return $this->hasMany(Reservation::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    // public function scopeSearch($query, $search)
    // {
    //     return $query->where('title', '%' . $search . '%')
    //                  ->orWhere('description', '%' . $search . '%')
    //                  ->with(['user', 'category']) ;
                    
    // }
}
