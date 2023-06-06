<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;

class ProductPageController extends Controller
{
    public function index($id){

        $product = Product::with('productCategory')->with('productImages')->with('productQuantety')->with('productOptions')->latest()->where('id','=',$id)->get();
        //$categorys = Category::all();
        //$settings = Setting::all();
        return view('product', [
            'product'=>$product,
            'categorys'=>Category::all(),
            'settings'=>Setting::all()
        ]);

    }
}
