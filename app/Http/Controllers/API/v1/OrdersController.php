<?php

namespace App\Http\Controllers\API\v1;

use App\Http\Controllers\Controller;
use App\Models\WoodType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    //provjera da li je tražena količina dostupna.
    //returns "true" / "false"
    public function getCheckQty(Request $request){
        
        //validacija
        $request->validate([
            'type_of_wood_id' => 'required',
            'qty' => 'required',
        ]);
        
        //error first
        
        $type = WoodType::find($request->input('type_of_wood_id'));
        
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
}
