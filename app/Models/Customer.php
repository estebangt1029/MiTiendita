<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable = [
    'name',
    'store_id',
    'phone'
];

public function debts()
{
    return $this->hasMany(Debt::class);
}
}
