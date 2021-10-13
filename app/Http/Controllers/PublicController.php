<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\TypeOfWood;
use App\Models\WoodCategory;
use App\Models\WoodType;
use Illuminate\Http\Request;

class PublicController extends Controller
{
public function index(){
    

    $typesOfWood =WoodType::get();
    $categories = WoodCategory::get();
    $data = [
        'typesOfWood'=>$typesOfWood,
        'categories'=>$categories,
        'order' => new Order()
    ];
    return view('welcome',$data);
}


}
