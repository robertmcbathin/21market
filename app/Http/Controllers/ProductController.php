<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use Illuminate\Http\Request;

use App\Http\Requests;
use DB;
use Session;

class ProductController extends Controller
{
    public function getMainPage()
    {
      $сategories    = DB::table('categories')
                          ->where('is_show',1)
                          ->orderBy('name', 'asc')
                          ->get();
      $subсategories = DB::table('subcategories')
                          ->where('is_show',1)
                          ->orderBy('name', 'asc')
                          ->get();
      $products      = DB::table('products')
                          ->where('priority','<=',3)
                          ->where('published',1)
                          ->where('in_stock','<=', 3)
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
    public function getSubcategoryList($id)
    {
      $subcategory = DB::table('subcategories')
                       ->where('id',$id)
                       ->where('is_show',1)
                       ->first();
      if ($subcategory !== null)
      {
        $products = DB::table('products')
                       ->where('subcategory_id',$id)
                       ->where('published',1)
                       ->get();
      }
      return view('shop.show_subcategory_products',[
        'subcategory' => $subcategory,
        'products' => $products 
        ]);
    }
    public function getProduct($id)
    {
      if($product = Product::find($id))
        {
          return view('shop.product',[
            'product' => $product
            ]);
        }
    }
}
