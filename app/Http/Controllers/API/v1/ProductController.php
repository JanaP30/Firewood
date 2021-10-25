<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    

    public function getProducts(){
        $products = Product::all();
        $data = [
            'products' => $products
        ];

        return response()->json($data, 200);
    }



    public function getProductTypes(){

        $productTypes = ProductType::all();
        $data = [
            'productTypes' => $productTypes
        ];

        return response()->json($data, 200);
    }
}
