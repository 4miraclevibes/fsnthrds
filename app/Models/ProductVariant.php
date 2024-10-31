<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'name',
        'price',
        'status',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function variantStock()
    {
        return $this->hasMany(VariantStock::class);
    }

    public function getAvailableStock()
    {
        return $this->variantStock->stockDetail->where('status', 'ready')->count();
    }
}
