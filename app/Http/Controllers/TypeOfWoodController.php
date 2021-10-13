<?php

namespace App\Http\Controllers;

use App\Models\TypeOfWood;
use App\Models\WoodType;
use Illuminate\Http\Request;

class TypeOfWoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $typeOfWood =WoodType::get();
        $data = [
            'typeOfWood'=>$typeOfWood
        ];
        return view('typeOfWood.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typeOfWood.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $typeOfWood = new WoodType();

        $typeOfWood ->name = $request -> input ('name');

        return redirect('/typeOfWood')->withSuccess('You have successfully created a type of wood');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TypeOfWood  $typeOfWood
     * @return \Illuminate\Http\Response
     */
    public function show(WoodType $typeOfWood)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TypeOfWood  $typeOfWood
     * @return \Illuminate\Http\Response
     */
    public function edit(WoodType $typeOfWood)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TypeOfWood  $typeOfWood
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WoodType $typeOfWood)
    {
        $typeOfWood = WoodType::findOrFail();
        
        $typeOfWood->update([
        'name' => $request -> input ('name')
        ]);
        return redirect('/typeOfWood')->withSuccess('You have successfully update a type of wood');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TypeOfWood  $typeOfWood
     * @return \Illuminate\Http\Response
     */
    public function destroy(WoodType $typeOfWood)
    {
        $typeOfWood = WoodType::findOrFail();
        $typeOfWood->delete();
        return redirect('/typeOfWood')->withSuccess("You have successfully deleted type of wood");
    }
}
