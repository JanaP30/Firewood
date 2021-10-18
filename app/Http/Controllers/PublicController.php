<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductType;

use Illuminate\Http\Request;

class PublicController extends Controller
{
public function index(){
    

    $products = Product::get();
    $productTypes = ProductType::get();
    
    $data = [
        'productTypes'=>$productTypes,
        'products'=> $products,
        'order' => new Order()
    ];
    
    return view('home',$data);
}


}
