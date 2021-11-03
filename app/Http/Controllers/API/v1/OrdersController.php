<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\ProductType;
use App\Repositories\Orders\OrdersService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    //provjera da li je tražena količina dostupna.
    //returns "true" / "false"
    public function getCheckQty(Request $request){
        
        //validacija
        $request->validate([
            
            'product_type_id'=> 'required',
             'qty' => 'required',
        ]);
        
        //error first
        
        $type = ProductType::find($request->input('product_type_id'));
        
        if(!$type){
            Log::error('Requested unknown wood type');
            
            return response()->json([
                'error' => 'This type of wood does not exist.'
            ], 422);
        }

        //logika funkcije
        if($request->qty > $type->qty){
            return [
                'requested_qty' => 'false',
                'available_qty' => $type->qty
            ];
        }else{
            return [
                'requested_qty' => 'true',
                'available_qty' => $type->qty
            ];
        }
        
    }

    public function getOrdersByEmail($request){
        
        if(!$request->has('email')){
            return response([
                'error' => 'Missing email param.'
            ], 422);
        }

        $orders = OrdersService::getOrdersByEmail($request->input('email'));

        // $data['orders'] = Order::all();
        if (!$orders->success){

            response()->json($orders->errors, 404);
        }
            
        return $orders->data;
}
}