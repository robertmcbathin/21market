<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;

class ProductController extends Controller
{
    public function getMainPage()
    {
      $сategories    = DB::table('categories')
                          ->orderBy('name', 'asc')
                          ->get();
      $subсategories = DB::table('subcategories')
                          ->orderBy('name', 'asc')
                          ->get();
      $products      = DB::table('products')
                          ->where('priority','<=',3)
      				      ->orderBy('priority', 'asc')
                          ->get();
      $banners      = DB::table('banners')
                        ->where('show_in', 1)
                        ->get();
    	return view('shop.index',[
        'categories' => $сategories,
        'subcategories' => $subсategories,
        'products' => $products,
        'banners'  => $banners
        ]);
    }
    public function getAddToCart(Request $request, $id)
    {
      $product = Product::find($id);
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->add($product, $product->id);

      $request->session()->put('cart', $cart);
      return redirect()->back();
    }
    public function getCart()
    {
      if (!Session::has('cart')){
        return view('shop.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      return view('shop.shopping-cart', [
        'products' => $cart->items, 
        'totalPrice' => $cart->totalPrice]);
    }
}
