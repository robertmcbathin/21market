<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class ProductController extends Controller
{
    public function getMainPage()
    {
    	return view('shop');
    }
}
