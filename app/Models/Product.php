<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;
use Intervention\Image\ImageManagerStatic;

class Product extends Model
{
    protected $fillable = ['name', 'category_id', 'price', 'picture', 'description'];

    public function getPriceAttribute($value)
    {
        return number_format($value, 2, '.', ' ');
    }

    public function getPictureAttribute($value)
    {
        if (!$value) {
            return false;
        }

        $path = \Storage::url($value);

//        $image = ImageManagerStatic::make($path)->resize(150, null, function ($img) {
//            $img->aspectRatio();
//        });

        return $path;//$image->response('jpg');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
