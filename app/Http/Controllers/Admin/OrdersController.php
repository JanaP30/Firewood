<?php

namespace App\Http\Controllers;

use App\Models\Order;



class OrdersController extends Controller
{

public function index()
    {
        $data['orders'] = Order::all();
        
        return view ('orders.index', $data);
    }

public function show($id)
{

    $data['orders'] = Order::findOrFail($id);

    return view ('orders.show', $data);

}

}