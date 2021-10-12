<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\TypeOfWood;
use Illuminate\Http\Request;

class PublicController extends Controller
{
public function index(){
    

    $typesOfWood =TypeOfWood::get();
    $categories = Category::get();
    $data = [
        'typesOfWood'=>$typesOfWood,
        'categories'=>$categories,
        'order' => new Order()
    ];
    return view('welcome',$data);
}
public function store(Request $request){

    $order = Order::create($request->input());

    // $order = Order::create([
    //     'first_name' => $request->input('first_name'),
    //     'last_name' => $request->input('last_name'),
    // ]);
    // dd($request->input());
    // // die;


    // $input = $request->input();

    // Order::create([
    //     'first_name' => $input['']
    // ]);

    // return $request;
    // $typeOfWood = TypeOfWood::findOrFail($request ->input('wood_type'));
    // Order::create([
    //     $typeOfWood->first_name=$request->input('name'),
    //     $typeOfWood->last_name=$request->input('Surname'),
    //     $typeOfWood->address=$request->input('Address'),
    //     $typeOfWood->phone_number=$request->input('Number'),
    //     $typeOfWood->quantity=0,
    //     $typeOfWood->typeOfWood_id=$request->input('id'),
    //     $typeOfWood->typeOfWood=$request->input('name'),
    //     $typeOfWood->category_id=$request->input('id'),
    //     $typeOfWood->category=$request->input('name'),
    //     $typeOfWood->description=$request->input('Note')
        
        
    // ]);
        
        return redirect('/success/'.$order->id);
    }

    public function success($orderId){
         
        return view('order.success', ['order' => Order::findOrFail($orderId)]);
    }


}