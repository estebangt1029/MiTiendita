<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    protected $fillable = [
    'name',
    'owner_id',
];

public function products()
{
    return $this->hasMany(Product::class);
}
}
