<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductAttribute extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'type',
        'value',
    ];

    public function productSkuAttribute()
    {
        return $this->hasMany(ProductSkuAttribute::class);
    }
}
