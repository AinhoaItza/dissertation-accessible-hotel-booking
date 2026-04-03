<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Room extends Model
{
    protected $fillable = [
        'hotel_id', 'name', 'type', 'description',
        'price_per_night', 'capacity', 'bed_type',
        'size_sqm', 'amenities', 'image_path', 'image_alt', 'is_available',
    ];

    protected $casts = [
        'amenities'        => 'array',
        'price_per_night'  => 'decimal:2',
        'is_available'     => 'boolean',
    ];

    // -------------------------------------------------------------------------
    // Relationships
    // -------------------------------------------------------------------------

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    // -------------------------------------------------------------------------
    // Accessors
    // -------------------------------------------------------------------------

    /** Returns the nightly price formatted as £X (e.g. "£89"). */
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => '£' . number_format((float) $this->price_per_night, 0),
        );
    }
}
