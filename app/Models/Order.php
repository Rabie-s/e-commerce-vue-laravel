<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'status',
        'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function OrderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }
}
