<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DrinkController extends Controller
{
    /**
     * Display a listing of all of the resources
     * GET drink/
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "all drinks";
    }

    /**
     * Store a newly created resource in storage.
     * Address: POST drink/
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return "new drink";
    }

    /**
     * Display the specified resource.
     * Address: GET drink/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return "one drink, id: ".$id;
    }

    /**
     * Update the specified resource in storage.
     * Address: PUT drink/{id}
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return "updating drink id: ".$id;
    }

    /**
     * Remove the specified resource from storage.
     * Address: DELETE drink/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return "deleting drink id: ".$id;
    }
}
