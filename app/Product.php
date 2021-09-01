<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    public  function category(){
        return $this->belongsTo('App\Category','category_id');
    }
    public  function supplies(){
        return $this->belongsToMany('App\Supply','Category_Product_relationship','product_id','supply_id');
    }
}
