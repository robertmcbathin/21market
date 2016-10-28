<?php

namespace App\Http\Controllers;

use App\Product;
use App\Cart;
use App\Order;
use App\Review;
use Illuminate\Http\Request;
use Auth;
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
    public function getRemindMe($product_id, $user_id)
    {
      DB::table('product_availability_reminders')->insert([
        'product_id' => $product_id,
        'user_id' => $user_id
        ]);
      return redirect()->back();
    }
    public function getReduceByOne($id)
    {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->reduceByOne($id);

      if (count($cart->items) > 0){
        Session::put('cart', $cart);
      } else {
        Session::forget('cart');
      }
      return redirect()->route('product.shoppingCart');
    }

    public function getRemoveItem($id)
    {
      $oldCart = Session::has('cart') ? Session::get('cart') : null;
      $cart = new Cart($oldCart);
      $cart->removeItem($id);

      if (count($cart->items) > 0){
        Session::put('cart', $cart);
      } else {
        Session::forget('cart');
      }
      
      return redirect()->route('product.shoppingCart');
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
        $bc_category = DB::table('categories')
                            ->where('id',$subcategory->category_id)
                            ->first();
      }

      return view('shop.show_subcategory_products',[
        'subcategory' => $subcategory,
        'products' => $products,
        'bc_category' => $bc_category
        ]);
    }
    public function getCategory($id)
    {
      $subcategory = DB::table('subcategories')
                       ->where('category_id',$id)
                       ->where('is_show',1)
                       ->get();
      $bc_category = DB::table('categories')
                        ->where('id',$id)
                        ->first();

    }
    public function getProduct($id)
    {
      if($product = Product::find($id))
        {
          $attributes = DB::table('product_attributes')
                      ->join('product_attributes_types', 'product_attributes.attribute_id', 
                        '=', 
                        'product_attributes_types.id')
                      ->select('product_attributes.value',
                        'product_attributes_types.name as name')
                      ->get();
          $tags = DB::table('product-tag')
            ->join('product_tags', 'product-tag.tag_id', '=', 'product_tags.id')
            ->select('product-tag.tag_id as id',
                      'product_tags.name as name')
            ->where('product-tag.product_id', $id)
            ->get();
          $bc_subcategory = DB::table('subcategories')
                            ->where('id',$product->subcategory_id)
                            ->first();
          $bc_category = DB::table('categories')
                            ->where('id',$bc_subcategory->category_id)
                            ->first();
  // Get all reviews that are not spam for the product and paginate them
          $reviews = $product->reviews()->with('user')->approved()->notSpam()->orderBy('created_at','desc')->paginate(10);
          //Catch user id
          if (Auth::user()) {$user_id = Auth::user()->id;} else {$user_id = 0;}
          return view('shop.product',[
            'product' => $product,
            'tags' => $tags,
            'bc_category' => $bc_category,
            'bc_subcategory' => $bc_subcategory,
            'attributes' => $attributes,
            'reviews' => $reviews,
            'user_id' => $user_id
            ]);
        }
    }
    public function getConfirm()
    {
      if (!Session::has('cart')){
        return view('shop.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view('shop.confirm',[
        'products' => $cart->items, 
        'total' => $total
        ]);
    }
    public function getConfirmed()
    {
      return view('shop.confirmed');
    }
    public function postConfirm(Request $request)
    {
      if (!Session::has('cart')){
        return view('shop.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);

      $order = new Order();
      $order->cart = serialize($cart);
      $order->user_id = $request['user_id'];
      $order->payment_type = $request['payment_type'];
      $order->delivery_type = $request['delivery_type'];
      $order->delivery_point = $request['delivery_point'];
      $order->status = $request['status'];
      
      Auth::user()->orders()->save($order);
      Session::forget('cart');
      Session::put('is_success', 'true');
      return redirect()->route('shop.confirmed');
    }
    public function getFastConfirm()
    {
      if (!Session::has('cart')){
        return view('shop.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);
      $total = $cart->totalPrice;
      return view('shop.fast-confirm',[
        'products' => $cart->items, 
        'total' => $total
        ]);
    }
     public function getFastConfirmed()
    {
      return view('shop.fast-confirmed');
    }
    public function postFastConfirm(Request $request)
    {
      if (!Session::has('cart')){
        return view('shop.shopping-cart');
      }
      $oldCart = Session::get('cart');
      $cart = new Cart($oldCart);

      $order = new Order();
      $order->cart = serialize($cart);
      $order->phone = $request['phone'];
      $order->payment_type = $request['payment_type'];
      $order->delivery_type = $request['delivery_type'];
      $order->delivery_point = $request['delivery_point'];
      $order->status = $request['status'];
      
      DB::table('orders')->insert([
        'cart' => $order->cart,
        'phone' => $order->phone,
        'status' => $order->status,
        'delivery_type' => $order->delivery_type,
        'delivery_point' => $order->delivery_point,
        'payment_type' => $order->payment_type]);
      Session::forget('cart');
      Session::put('is_success', 'true');
      return redirect()->route('shop.fast-confirmed');
    }
    public function getProductList(Request $request)
    {
      $q = $request['q'];
      $qToString = '%' . $q . '%';
      $products = DB::table('products')
                ->where('name', 'like',$qToString)
                ->limit(10)
                ->get();
      if ($products !== NULL){
        return response()->json(['message' => 'ok', 'products' => $products], 200);
      }
    }

    /*CONFIRM PRODUCT RATING*/
      public function postConfirmProductRating($id)
      {
        return 'Спасибо за Ваш отзыв!';
      }
    /*----------------------*/
}
