<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bottle extends Model
{
    //The drinks table details
    protected $table = "bottles";
    protected $primaryKey = "bottle_id";
    
        //The table fields
    protected $fillable = [
        'bottle_name',
        'bottle_type',
        'bottle_image',
        'alcohol_content_percent'
        ];

    //The drinks that use this bottle as an ingredient
    public function drinks()
    {
        return Drink::where(function ($query) {
            return $query->where('ingredient_1', $this->bottle_id)
            ->orWhere('ingredient_2', $this->bottle_id)
            ->orWhere('ingredient_3', $this->bottle_id)
            ->orWhere('ingredient_4', $this->bottle_id);
        });
    }
}
