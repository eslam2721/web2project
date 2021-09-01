<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
//use App\Product;
class categoryController extends Controller
{
    //
    public function show(){
        $categories=Category::all();
        return view('category/catview',compact('categories'));
    }
    public function add_category(){
        return view('category/addcategory');
    }
    public  function add_new_category(Request $request)
    {
        $cat=new Category;
        $cat->name=$request->input('name');
        $cat->description=$request->input('description');
        $cat->save();
        return back();

    }
    public function delete($id){

       $cat=Category::find($id);
        //$products_items=array();
        //if($cat!=null)
        $products_items=$cat->products;

        $products_items->delete();
        $cat->delete();
        return back();
    }
}
