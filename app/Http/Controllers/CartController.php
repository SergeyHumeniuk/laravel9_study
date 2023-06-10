<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Setting;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {

        $product = Product::with('productCategory')->with('productImages')->with('productQuantety')->with('productOptions')->latest()->get();
        return view('cart', [
            'product'=>$product,
            'categorys'=>Category::all(),
            'settings'=>Setting::all()
        ]);
    }
    public function addItem(Request $request, $productId)
    {
        $product = Product::with('productCategory')->with('productImages')->with('productQuantety')->with('productOptions')->latest()->where('id','=',$productId)->get();
        $cart = $request->session()->get('cart', []);

        if (array_key_exists($productId, $cart)) {
            $cart[$productId]['quantety']++;
        } else {
            $cart[$productId] = ['product'=>$product, 'quantety'=>1];
        }

        $request->session()->put('cart', $cart);

        return redirect()->back()->withInput($request->input());
    }
    public function deleteItem(Request $request, $productId){
        $cart = $request->session()->get('cart', []);

        if (array_key_exists($productId, $cart)) {
            unset($cart[$productId]);
        }

        $request->session()->put('cart', $cart);
        return redirect()->back()->withInput($request->input());
    }
}
