<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'stock',
        'status	',
        'category_id',
    ];
}
