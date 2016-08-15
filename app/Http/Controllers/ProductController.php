<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

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
    	return view('shop.index',[
        'categories' => $сategories,
        'subcategories' => $subсategories,
        'products' => $products
        ]);
    }
}
