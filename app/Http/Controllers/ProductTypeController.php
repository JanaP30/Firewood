<?php

namespace App\Http\Controllers;


use App\Models\ProductType;
use Illuminate\Http\Request;

class ProductTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productType =ProductType::get();
        $data = [
            'productType'=>$productType
        ];
        return view('product-type.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productType = new ProductType();

        $productType ->name = $request -> input ('name');

        return redirect('/product-type')->withSuccess('You have successfully created a type of wood');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductType  $typeOfWood
     * @return \Illuminate\Http\Response
     */
    public function show(ProductType $typeOfWood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProductType  $typeOfWood
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeOfWood  $typeOfWood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType)
    {
        $productType = ProductType::findOrFail();
        
        $productType->update([
        'name' => $request -> input ('name')
        ]);
        return redirect('/product-type')->withSuccess('You have successfully update a product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductType  $typeOfWood
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductType $productType)
    {
        $productType = ProductType::findOrFail();
        $productType->delete();
        return redirect('/product-type')->withSuccess("You have successfully deleted product");
    }
}
