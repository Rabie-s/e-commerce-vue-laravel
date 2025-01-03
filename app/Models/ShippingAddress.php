<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ShippingAddress extends Model
{
    use HasFactory;
    protected $fillable = ['first_name','last_name','country', 'area', 'street_address', 'phone_number', 'user_id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(user::class);
    }
}
