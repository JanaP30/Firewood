<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use App\Models\ProductType;
use App\Models\Product;
use App\Models\ProductProductType;
use Exception;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::get();
        $data = [
            'order'=>$order
            
        ];
        return view('order.index', $data);
    }


    public function approved($id)
    {
        $order = Order::findOrFail($id);

        $order->update([
            'status'=>Order::$_ORDER_APPROVED

        ]);

        return redirect('/order');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('order.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(OrderRequest $request)
    {

        //normalizacija
        $input = $request->input();
        $input['quantity'] = (integer)$input['quantity'];
      


        $productTypeProduct = ProductProductType::find($input['combination_id']);
        if(!$productTypeProduct){
            return redirect()->back()->withErrors(['No such combination']);
        }

       
        if($productTypeProduct->quantity < $input['quantity']){
            return redirect()->back()->withErrors(['Requested product quantity not available.']);
        }

        try{
            
            DB::beginTransaction();

            $newTypeQty = $productTypeProduct->quantity - $input['quantity'];
            
            $productTypeProduct->update([
                'quantity' => $newTypeQty
            ]);

            
            $order = Order::create([
                'first_name' => $input['first_name'],
                'last_name' => $input['last_name'],
                'address'  => $input['address'],
                'phone_number' => $input['phone_number'],
                'quantity' => $input['quantity'],
                'product_type_id' => $productTypeProduct->product_type_id,
                'product_id' => $productTypeProduct->product_id,
                'note' => $input['note']
            ]);

            DB::commit();

        }catch(Exception $exception){
            // dd($exception);
            DB::rollBack();
            Log::error($exception);

            return redirect()->back()->withErrors(['There has been an error submitting your order. Please contact support if the problem persists.']);
        }
        
    
        return redirect('/success/'.$order->id);   
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        $order= Order:: findOrFail();
        $order->update([

           // 'quantity'=>$request->input('quantity')->where($quantity=$quantity - $order),

           // 'quantity'=>$request->$quantity - $order;
           // $stock->$request->input('stock'),
          // $stock= $quantity - $order;
        ]);
    

        return redirect('/order')->withSuccess('You have successfully update a order');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
    public function success($orderId){
         
        return view('order.success', ['order' => Order::findOrFail($orderId)]);
    }
}
