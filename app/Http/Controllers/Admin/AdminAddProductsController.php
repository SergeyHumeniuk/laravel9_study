<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Product_option;
use App\Models\Product_category;
use App\Models\Product_image;

class AdminAddProductsController extends Controller
{
    public function index(){
        $user_login = Auth::user();
        $categories = Category::get();
        return view('admin/add_products', ['user_login'=>$user_login, 'categories'=>$categories]);
    }
    public function addProduct(Request $request){
        //dd($request);
        if ($request->isMethod('post')){
            $this->validate($request, [
                'articul' => 'required',
                'category' => 'required',
                'quantity' => 'required',
                'price' => 'required',
                'zakupka' => 'required'
            ]);
        //take data request
        //dd($request);
        $articul = $request['articul'];
        $category = $request['category'];
        $name_product = $request['name_product'];
        $big_opis = $request['big_opis'];
        $quantity = $request['quantity'];
        $price = $request['price'];
        $discount = $request['discount'];
        $zakupka = $request['zakupka'];
        if($request->has('new_product')){
            $checked_new_prod = 1;
        }else{
            $checked_new_prod = 0;
        }
        if($request->has('top_sale')){
            $checked_top_sale = 1;
        }else{
            $checked_top_sale = 0;
        }

        //add to product and get id_product
        $id_product = DB::table('products')->insertGetId(
                ['articul' => $articul,
                'name' => $name_product,
                'new_prod' => $checked_new_prod,
                'top_sale' => $checked_top_sale,
                'description' => $big_opis,
                'price' => $price,
                'discount'=>$discount,
                'zacupka' => $zakupka,
                'created_at' => \Carbon\Carbon::now(),
                'updated_at' => \Carbon\Carbon::now()
                ]);

        //add rest request
        DB::table('product_category')->insert(
            ['id_product' => $id_product,
            'id_category' => $category,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
            ]);
        DB::table('product_quantity')->insert(
            ['id_product' => $id_product,
            'quantity' => $quantity,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
            ]);
        //add option products
        if (!empty($request['name_option'])){
            //dd(count($request['name_option']));
            for ($i=0; count($request['name_option']) > $i; $i++){
                $name_option = $request['name_option'][$i];
                $value_option = $request['value_option'][$i];
                if($name_option!='' && $value_option!=''){
                    DB::table('products_options')->insert(
                        ['id_product' => $id_product,
                        'name_option' => $name_option,
                        'value_option' => $value_option,
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                        ]);
                }

            }
        }
        //add image
        if ($request->hasFile('picture')) {
        $file = $request->file('picture');
            foreach ($file as $fil){
                $ext = $fil->getClientOriginalExtension();
                $filename = pathinfo($fil->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = time() . '_' . $filename.'.'.$ext;
                $filePath = $fil->storeAs('product_image/'.$articul.'', $fileName, 'public');
                DB::table('product_image')->insert(
                    ['id_product' => $id_product,
                    'image' => $filePath,
                    'created_at' => \Carbon\Carbon::now(),
                    'updated_at' => \Carbon\Carbon::now()
                    ]);
            }
        }
        }
        $user_login = Auth::user();
        $products = Product::with('productCategory')->with('productImages')->with('productQuantety')->get();
        $categorys = Category::all();
        return view('admin/products', [
            'user_login'=>$user_login,
            'products'=>$products,
            'categorys'=>$categorys,
            'created_at' => \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now()
        ]);
    }
}
