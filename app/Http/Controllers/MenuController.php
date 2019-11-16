<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
class MenuController extends Controller
{
    //
    function getMenuAdmin(){
        $query = Menu::orderBy('name', 'ASC')->get();
        return view('menu',['listMenu' =>$query]);
    }
    public function getMenu(){
        $query = Menu::orderBy('name', 'ASC')->get();
        return view('shop', ['listMenu' => $query]);
    }
 
    public function getCart(){
        return view('cart');
    }
    public function addToCart($id){
        $query = Menu::find($id);
 
        if(!$query) {
            abort(404);
        }
 
        $cart = session()->get('cart');
 
        // if cart is empty then this the first product
        if(!$cart) {
 
            $cart = [
                    $id => [
                        "idMenu" => $id,
                        "name" => $query->name,
                        "quantity" => 1,
                        "price" => $query->harga,
                        "foto" => $query->foto
                    ]
            ];
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
        }
 
        // if cart not empty then check if this product exist then increment quantity
        if(isset($cart[$id])) {
 
            $cart[$id]['quantity']++;
 
            session()->put('cart', $cart);
 
            return redirect()->back()->with('success', 'Product added to cart successfully!');
 
        }
 
        // if item not exist in cart then add to cart with quantity = 1
        $cart[$id] = [
            "idMenu" => $id,
            "name" => $query->name,
            "quantity" => 1,
            "price" => $query->harga,
            "foto" => $query->foto
        ];
 
        session()->put('cart', $cart);
 
        return redirect()->back()->with('success', 'Product added to cart successfully!');
    }
    public function removeMenuFromCart(Request $request){
        if($request->id) {
 
            $cart = session()->get('cart');
 
            if(isset($cart[$request->id])) {
 
                unset($cart[$request->id]);
 
                session()->put('cart', $cart);
            }
 
            session()->flash('success', 'Product removed successfully');
        }
    }
}
