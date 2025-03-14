<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\belongsTo;

class product_image extends Model
{
    protected $fillable = [
        'product_id',
        'image_url',
        'is_primary',
       
    ];
    public function product():belongsTo{
     return   $this->belongsTo(product::class);
    }
}
