<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bottle;

use Exception;

class BottleController extends Controller
{
    /**
     * Returns all bottles in the database
     *
     * GET bottle/
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bottles = Bottle::all();
        return $bottles;
    }

    /**
     * Store a new bottle in the database
     *
     * Address: POST bottle/
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //The array to store the variables to add to the database
        $newbottle = [];
        //Check for bottle name
        if (isset($request['name'])) {
            $newbottle['bottle_name'] = $request['name'];
        } else {
            //Required
            return ["error" => "A bottle name is required"];
        }

        //Check for at least one ingredient
        if (isset($request['type'])) {
            $newbottle['bottle_type'] = $request['type'];
        } else {
            //Required
            return ["error" => "The bottle type is required"];
        }

        //Non necessary values
        $newbottle['bottle_image'] = isset($request['image'])? $request['image'] : null;
        $newbottle['alcohol_content_percent'] = isset($request['alcoholContent'])? $request['alcoholContent'] : null;
       
        if (Bottle::create($newbottle)) {
            return ["success" => $newbottle['bottle_name']." was created successfully"];
        } else {
            return ["error" => "An error occured. Please try making the bottle again"];
        }
    }

    /**
     * Shows the details for a specific bottle
     *
     * Address: GET bottle/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return Bottle::findOrFail($id);
        } catch (Exception $ex) {
            return ["error" => "No bottle found"];
        }
    }

    /**
     * Updates the required bottle

     * Address: PUT bottle/{id}
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // The updated bottle variables to change
        $updatebottle = [];
        try {
            $bottle = bottle::findOrFail($id);
        } catch (Exception $ex) {
            return ["error" => "No bottle found"];
        }

        //Need to check for all the values individually
        if (isset($request['name'])) {
            if ($request['name'] != null) {
                $bottle['bottle_name'] = $request['name'];
            } else {
                return ["error" => "A bottle needs a name"];
            }
        }

        if (isset($request['type'])) {
            if ($request['type'] != null) {
                $bottle['bottle_type'] = $request['type'];
            } else {
                return ["error" => "A bottle needs a type"];
            }
        }

        if (isset($request['image']) && $request['image'] != null) {
            $bottle['bottle_image'] = $request['image'];
        }

        if (isset($request['alcoholContent']) && $request['alcoholContent'] != null) {
            $bottle['alcohol_content_percent'] = $request['alcoholContent'];
        }

        //Update any values that have been set
        if ($bottle->save()) {
            return ["success" => $bottle->bottle_name." was updated"];
        } else {
            return ["error" => "bottle could not be updated. Try again"];
        }
    }

    /**
     * Remove the specified resource from storage.
     * Address: DELETE bottle/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $bottle = bottle::findOrFail($id);
            $bottleName = $bottle['bottle_name'];
        } catch (Exception $ex) {
            return ["error" => "No bottle found"];
        }
        if ($bottle->delete()) {
            return ["success" => $bottleName." was deleted"];
        } else {
            return ["error" => "Bottle could not be deleted. Try again"];
        }
    }
}
