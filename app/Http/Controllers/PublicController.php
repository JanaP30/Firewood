<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\ProductProductType;
use App\Models\ProductType;

use Illuminate\Http\Request;

class PublicController extends Controller
{
public function index(){
    

    $combinations = ProductProductType::where('quantity', '>', 0)->get();
    
    $data = [
        'order' => new Order(),
        'combinations' => $combinations
    ];
    
    return view('welcome',$data);
}


}
