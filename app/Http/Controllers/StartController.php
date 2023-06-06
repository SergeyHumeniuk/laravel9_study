<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;

class StartController extends Controller
{
    public function index(){

        $products_new_prod = Product::with('productCategory')->with('productImages')->with('productQuantety')->with('productOptions')->latest()->where('new_prod','=','1')->get();
        $products_top_sale = Product::with('productCategory')->with('productImages')->with('productQuantety')->with('productOptions')->latest()->where('top_sale','=','1')->get();
        $categorys = Category::all();
        $settings = Setting::all();
        return view('home', [
            'products_new_prod'=>$products_new_prod,
            'products_top_sale'=>$products_top_sale,
            'categorys'=>$categorys,
            'settings'=>$settings
        ]);

    }
}
