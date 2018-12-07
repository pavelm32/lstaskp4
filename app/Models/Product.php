<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'price', 'picture', 'description'];

    public function getPriceAttribute($value)
    {
        return number_format($value, 2, '.', ' ');
    }

    public function getPictureAttribute($value)
    {
        return \Storage::url($value);
    }
}
