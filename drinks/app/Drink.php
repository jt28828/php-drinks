<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Drink extends Model
{
    //The drinks table details
    protected $table = "drinks";
    protected $primaryKey = "drink_id";
}
