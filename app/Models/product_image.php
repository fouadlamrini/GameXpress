<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class product_image extends Model
{
    protected $fillable = [
        'product_id',
        'image_url',
        'is_primary',
       
    ];
}
