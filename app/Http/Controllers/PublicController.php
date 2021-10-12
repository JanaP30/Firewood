<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\TypeOfWood;
use Illuminate\Http\Request;

class PublicController extends Controller
{
public function index()

{
    $typesOfWood =TypeOfWood::get();
    $categories = Category::get();
    $data = [
        'typesOfWood'=>$typesOfWood,
        'categories'=>$categories
    ];
    return view('welcome',$data);
}
public function store(Request $request)
    {
        $typeOfWood = new TypeOfWood();
        $categories = new Category();
        $typeOfWood ->name = $request -> input ('name');
        $categories ->name = $request -> input('name');
        return redirect('/')->withSuccess('You have successfully created a order');

    }


}