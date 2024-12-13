<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductSkuAttribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'product_sku_id',
        'product_attribute_id'
    ];

    public function productSku()
    {
        return $this->belongsTo(ProductSku::class);
    }

    public function productAttribute()
    {
        return $this->belongsTo(ProductAttribute::class);
    }
}
