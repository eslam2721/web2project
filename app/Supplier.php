<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    //
    public  function products(){
        return $this->belongsToMany('App\Product','Category_Product_relationship', 'supply_id','product_id');
    }
}
