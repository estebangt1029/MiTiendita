<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SaleItem extends Model
{
    public function product()
{
    return $this->belongsTo(Product::class);
}

protected $fillable = [
    'sale_id',
    'product_id',
    'quantity',
    'price',
    'subtotal'
];
}
