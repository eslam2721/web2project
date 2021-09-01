<?php

namespace App\Http\Controllers;
use App\Category;
use App\Product;
use Illuminate\Http\Request;

class productController extends Controller
{
    public function show($id){
        $cat=Category::find($id);
        //$products_items=array();
        //if($cat!=null)
        $products_items=$cat->products;
        return view('product/proview',compact('products_items'));
    }
    public function add_product(){
        $categories=Category::all();
        //$products_items=array();
        //if($cat!=null)

        return view('product/addproduct',compact('categories'));
    }
    public  function add_new_product(Request $request)
    {
        $prod=new Product;
        $prod->name=$request->input('name');

        $file_img=$request->file('img');
        $img_name=$file_img->getClientOriginalName();
        $file_img->move('images',$img_name);
        $prod->img=$img_name;

        $prod->category_id=$request->input('category_id');
        $prod->price=$request->input('price');
        $prod->quantity=$request->input('quantity');
        $prod->description=$request->input('description');
        $prod->discounted=$request->input('discounted');
        $prod->save();
        $categories=Category::all();
        //return redirect('catview',compact('categories'));
        return redirect('/Catshow');

    }
    public function delete($id){
        $pro=Product::find($id);
        $pro->delete();
       return back();
    }
    public function edit_old_product($id)
    {
        $pro=Product::find($id);
        return view('product/editproduct',compact('pro'));
    }
    public function edit_product($id,Request $request)
    {
        $prod=Product::find($id);
        $prod->name=$request->input('name');
        $prod->price=$request->input('price');
        $prod->quantity=$request->input('quantity');
        $prod->description=$request->input('description');
        $prod->discounted=$request->input('discounted');
        $prod->save();
        return redirect('/Catshow');
    }
    
    public function add_to_cart($id)
    {
        $product = Product::find($id);

        if (!$product) {

            abort(404);

        }
        if ($product->quantity > 0) {
            $product->quantity -= 1;
            $product->save();
            $cart = session()->get('cart');

            // if cart is empty then this the first product
            if (!$cart) {

                $cart = [
                    $id => [
                        "name" => $product->name,
                        "quantity" => 1,
                        "price" => $product->price,
                        "image" => $product->img
                    ]
                ];

                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Product added to cart successfully!');
            }

            // if cart not empty then check if this product exist then increment quantity
            if (isset($cart[$id])) {

                $cart[$id]['quantity']++;

                session()->put('cart', $cart);

                return redirect()->back()->with('success', 'Product added to cart successfully!');

            }

            // if item not exist in cart then add to cart with quantity = 1
            $cart[$id] = [
                "name" => $product->name,
                "quantity" => 1,
                "price" => $product->price,
                "image" => $product->img
            ];

            session()->put('cart', $cart);

            return redirect()->back()->with('success', 'Product added to cart successfully!');
        } else {

            return redirect()->back()->with('m', 'no quantity for this product');
        }
    }
        public function cart()
        {
            return view('/product/cart');
        }
}
