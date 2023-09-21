<?php

namespace App\Repositories;

use App\Interfaces\ProductRepositoryInterface;
use App\Models\Product;
use App\Models\Media;

class ProductRepository implements ProductRepositoryInterface
{
    public function getAllProducts()
    {        
        return Product::all();
    }

    public function getProductByCategory($type)
    {
        return Product::where('type',$type)->get();
    }

    public function getProductById($id)
    {
        return Product::find($id);
    }
}
