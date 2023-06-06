<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;

class CategoryPageController extends Controller
{
    public function index($id){

        $product = Product::with('productImages')->with('productQuantety')->with('productOptions')->join('product_category', 'product_category.id_product', '=', 'products.id')->latest('products.created_at')->where('product_category.id_category','=',$id)->get();
        //$categorys = Category::all();
        //$settings = Setting::all();
        return view('category', [
            'product'=>$product,
            'categorys'=>Category::all(),
            'settings'=>Setting::all()
        ]);

    }
}
