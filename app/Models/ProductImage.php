<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $fillable = [
        'product_id',
        'image',
        'position',
        'alt_text',
        'status'
    ];

    public function images(){
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function product(){
        return $this->belongsTo(Product::class, 'product_id');
    }
}
