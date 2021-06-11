<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class FrontController extends Controller
{
    public function getData()
    {
        $sport = Product::where('category_id',1)->first();
        // dd($sport);
        return view('welcome',compact('sport'));
    }
}
