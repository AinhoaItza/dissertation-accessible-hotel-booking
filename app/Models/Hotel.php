<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Hotel extends Model
{
    protected $fillable = [
        'name', 'slug', 'description', 'address', 'area', 'city', 'country',
        'star_rating', 'min_price', 'rating', 'review_count',
        'image_path', 'image_alt', 'amenities',
    ];

    protected $casts = [
        'amenities'  => 'array',
        'min_price'  => 'decimal:2',
        'rating'     => 'decimal:1',
    ];

    // -------------------------------------------------------------------------
    // Relationships
    // -------------------------------------------------------------------------

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class);
    }

    public function reviews(): HasMany
    {
        return $this->hasMany(Review::class);
    }

    // -------------------------------------------------------------------------
    // Route model binding
    // -------------------------------------------------------------------------

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    // -------------------------------------------------------------------------
    // Query scopes
    // -------------------------------------------------------------------------

    /** Filter by exact city name (case-insensitive via LIKE). */
    public function scopeByCity(Builder $query, string $city): Builder
    {
        return $query->where('city', 'like', $city);
    }

    /** Filter to hotels whose starting price falls within the given range. */
    public function scopeByPrice(Builder $query, float $min, float $max): Builder
    {
        return $query->whereBetween('min_price', [$min, $max]);
    }

    /** Filter to hotels with a stored rating of at least $min (0–5 scale). */
    public function scopeByRating(Builder $query, float $min): Builder
    {
        return $query->where('rating', '>=', $min);
    }

    // -------------------------------------------------------------------------
    // Accessors
    // -------------------------------------------------------------------------

    /** Returns the starting price formatted as £X (e.g. "£149"). */
    protected function formattedPrice(): Attribute
    {
        return Attribute::make(
            get: fn () => '£' . number_format((float) $this->min_price, 0),
        );
    }

    /**
     * Returns the average review rating (1–10 scale) calculated from the
     * reviews relation. Falls back to the stored `rating` field (×2 to
     * convert from the 0–5 scale) when no reviews exist.
     */
    protected function averageRating(): Attribute
    {
        return Attribute::make(
            get: function () {
                $avg = $this->reviews()->avg('rating');

                return $avg !== null
                    ? round((float) $avg, 1)
                    : round((float) $this->rating * 2, 1);
            },
        );
    }
}
