<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class ProductImage extends Model
{
    use HasFactory;

    protected $fillable = ['image', 'product_id'];

    protected $appends = ['image_url'];
    
    public function getImageUrlAttribute(){
        return asset('storage/images/' . $this->image);
    }

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class);
    }
}
