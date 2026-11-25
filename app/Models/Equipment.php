<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Equipment extends Model
{
    protected $fillable = [
        'equipment_name', 'category', 'unit_price',
        'description', 'availability_status',
    ];

    protected $casts = ['unit_price' => 'decimal:2'];

    public const CATEGORIES = ['paddles', 'balls', 'nets', 'accessories'];
    public const STATUSES = ['available', 'unavailable'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
