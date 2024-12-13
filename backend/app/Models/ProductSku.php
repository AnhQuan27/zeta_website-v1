<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSku extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'sku',
        'price',
        'quantity',
        'product_id'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function productSkuAttribute()
    {
        return $this->hasMany(ProductSkuAttribute::class);
    }
}
