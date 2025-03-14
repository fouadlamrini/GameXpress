<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Relations\belongsTo;
use Illuminate\Database\Eloquent\Relations\hasMany;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'price',
        'stock',
        'status',
        'category_id',
    ];
    public function User():belongsTo 
    {
        return $this->belongsTo(User::class);

    }

    public function product_images():hasMany{
        return $this->hasMany(product_image::class);
    }


    public function categorie():belongsTo{
        return $this->belongsTo(categorie::class);
    }
}
