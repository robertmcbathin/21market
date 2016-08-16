<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PurchaseController extends Controller
{
    public function getMainPage()
    {
    	return view('sp');
    }
}
