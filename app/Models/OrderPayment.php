<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderPayment extends Model
{
    use HasFactory;
    protected $fillable = [
        'payment_method',
        'amount',
        'status',
        'order_id'
    ];

    public function order():BelongsTo{
        return $this->belongsTo(Order::class);
    }
}
