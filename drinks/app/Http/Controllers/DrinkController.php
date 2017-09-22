<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Drink;

use Exception;

class DrinkController extends Controller
{
    /**
     * Returns all drinks in the database
     *
     * GET drink/
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drinks = Drink::all();
        return $drinks;
    }

    /**
     * Store a new drink in the database
     *
     * Address: POST drink/
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //The array to store the variables to add to the database
        $newDrink = [];
        //Check for drink name
        if (isset($request['name'])) {
            $newDrink['drink_name'] = $request['name'];
        } else {
            //Required
            return ["error" => "A drink name is required"];
        }

        //Check for at least one ingredient
        if (isset($request['ingredient1'])) {
            $newDrink['ingredient_1'] = $request['ingredient1'];
        } else {
            //Required
            return ["error" => "At least one ingredient is required"];
        }

        //Check for at least 1 ingredient amount
        if (isset($request['ingredient1Amount'])) {
            $newDrink['ingredient_1_amount'] = $request['ingredient1Amount'];
        } else {
            //Required
            return ["error" => "Please enter an amount for at least one ingredient"];
        }

        //Non necessary values
        $newDrink['drink_image'] = isset($request['image'])? $request['image'] : null;
        $newDrink['drink_color'] = isset($request['color'])? $request['color'] : null;
        $newDrink['ingredient_2'] = isset($request['ingredient2'])? $request['ingredient2'] : null;
        $newDrink['ingredient_2_amount'] = isset($request['ingredient2Amount'])? $request['ingredient2Amount'] : null;
        $newDrink['ingredient_3'] = isset($request['ingredient3'])? $request['ingredient3'] : null;
        $newDrink['ingredient_3_amount'] = isset($request['ingredient3Amount'])? $request['ingredient3Amount'] : null;
        $newDrink['ingredient_4'] = isset($request['ingredient4'])? $request['ingredient4'] : null;
        $newDrink['ingredient_4_amount'] = isset($request['ingredient4Amount'])? $request['ingredient4Amount'] : null;

        if (Drink::create($newDrink)) {
            return ["success" => $newDrink['drink_name']." was created successfully"];
        } else {
            return ["error" => "An error occured. Please try making the drink again"];
        }
    }

    /**
     * Shows the details for a specific drink
     *
     * Address: GET drink/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            return Drink::findOrFail($id);
        } catch (Exception $ex) {
            return ["error" => "No drink found"];
        }
    }

    /**
     * Updates the required drink

     * Address: PUT drink/{id}
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // The updated drink variables to change
        $updateDrink = [];
        try {
            $drink = Drink::findOrFail($id);
        } catch (Exception $ex) {
            return ["error" => "No drink found"];
        }

        //Need to check for all the values individually
        if (isset($request['name'])) {
            if ($request['name'] != null) {
                $drink['drink_name'] = $request['name'];
            } else {
                return ["error" => "A drink needs a name"];
            }
        }

        if (isset($request['image']) && $request['image'] != null) {
            $drink['drink_image'] = $request['image'];
        }

        if (isset($request['color']) && $request['color'] != null) {
            $drink['drink_color'] = $request['color'];
        }

        if (isset($request['ingredient1'])) {
            if ($request['ingredient1'] != null) {
                $drink['ingredient_1'] = $request['ingredient1'];
            } else {
                return ["error" => "A drink needs at least 1 ingredient"];
            }
        }

        if (isset($request['ingredient1Amount'])) {
            if ($request['ingredient1Amount'] != null) {
                $drink['ingredient_1_amount'] = $request['ingredient1Amount'];
            } else {
                return ["error" => "A drink needs at least 1 ingredient"];
            }
        }

        if (isset($request['ingredient2']) && $request['ingredient2'] != null) {
            $drink['ingredient_2'] = $request['name'];
        }

        if (isset($request['ingredient2Amount']) && $request['ingredient2Amount'] != null) {
            $drink['ingredient_2_amount'] = $request['ingredient1'];
        }

        if (isset($request['ingredient3']) && $request['ingredient3'] != null) {
            $drink['ingredient_3'] = $request['name'];
        }

        if (isset($request['ingredient3Amount']) && $request['ingredient3Amount'] != null) {
            $drink['ingredient_3_amount'] = $request['ingredient1'];
        }

        if (isset($request['ingredient4']) && $request['ingredient4'] != null) {
            $drink['ingredient_4'] = $request['name'];
        }

        if (isset($request['ingredient4Amount']) && $request['ingredient4Amount'] != null) {
            $drink['ingredient_4_amount'] = $request['ingredient1'];
        }
        //Update any values that have been set
        if ($drink->save()) {
            return ["success" => $drink->drink_name." was Updated"];
        } else {
            return ["error" => "Drink could not be updated. Try again"];
        }
    }

    /**
     * Remove the specified resource from storage.
     * Address: DELETE drink/{id}
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $drink = Drink::findOrFail($id);
            $drinkName = $drink['drink_name'];
        } catch (Exception $ex) {
            return ["error" => "No drink found"];
        }
        if ($drink->delete()) {
            return ["success" => $drinkName." was deleted"];
        } else {
            return ["error" => "Drink could not be deleted. Try again"];
        }
    }
}
