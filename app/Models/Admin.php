<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone_number',
    ];

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
    }
}
