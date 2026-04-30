<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Booking extends Model
{
    protected $fillable = [
        'user_id', 'hotel_id', 'room_id',
        'check_in', 'check_out', 'guests', 'nights',
        'subtotal', 'vat', 'total', 'reference',
    ];

    protected function casts(): array
    {
        return [
            'check_in'  => 'date',
            'check_out' => 'date',
            'subtotal'  => 'decimal:2',
            'vat'       => 'decimal:2',
            'total'     => 'decimal:2',
        ];
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hotel(): BelongsTo
    {
        return $this->belongsTo(Hotel::class);
    }

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
