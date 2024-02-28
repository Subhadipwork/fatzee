<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // protected $with = ['productimage', 'category'];

    protected $guarded = [];

    public function adminproductimage(){

        return $this->hasOne(ProductImage::class);
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category', 'category_id');
    }

    
}
