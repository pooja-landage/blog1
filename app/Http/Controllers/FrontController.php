<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class FrontController extends Controller
{
    public function getData()
    {   
        $all = Product::all();
        $sport = Product::where('category_id',1)->get();
        $business = Product::where('category_id',2)->get();
        $technology = Product::where('category_id',3)->get();
        $entertainment = Product::where('category_id',4)->get();
    
        $feat = Product::all();


        // dd($sport);
        // dd($sport);
        return view('welcome',compact('sport','all','business','technology','feat','entertainment'));
    }

  
}
