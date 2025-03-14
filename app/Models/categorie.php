<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;

class categorie extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];

    public function products():HasMany{
     return   $this->HasMany(product::class);
    }
}
