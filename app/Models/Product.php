<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;

    public function getProductImageAttribute()
    {
        $product_image = Media::where([['model_id',$this->id],['file_type','product']])->first();
        return ((isset($product_image->file_name))?$product_image->file_name:'');
    }
}
