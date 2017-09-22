<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    //The drinks table details
    protected $table = "drinks";
    protected $primaryKey = "drink_id";

    //The table fields
    protected $fillable = [
        'drink_name',
        'drink_name',
        'drink_image',
        'ingredient_1',
        'ingredient_2',
        'ingredient_3',
        'ingredient_4',
        'ingredient_1_amount',
        'ingredient_2_amount',
        'ingredient_3_amount',
        'ingredient_4_amount',
        'drink_color'
    ];

    //The bottle(s) that make up this drink
    public function bottles()
    {
        return Bottle::where(function ($query) {
            return $query->where('bottle_id', $this->ingredient_1)
            ->orWhere('bottle_id', $this->ingredient_2)
            ->orWhere('bottle_id', $this->ingredient_3)
            ->orWhere('bottle_id', $this->ingredient_4);
        });
    }
}
