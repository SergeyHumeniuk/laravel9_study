<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;

class AdminProductsController extends Controller
{

    public function index(){
        $user_login = Auth::user();
        $products = Product::with('productCategory')->with('productImages')->with('productQuantety')->get();
        $categorys = Category::all();
        return view('admin/products', [
            'user_login'=>$user_login,
            'products'=>$products,
            'categorys'=>$categorys
        ]);
    }

    public function updateProduct(Request $request){
        $id_product = request()->id;

        if ($request->isMethod('post')){
            //dd($request);
            $articul = $request['articul'];
            $category = $request['category'];
            $name_product = $request['name_product'];
            $big_opis = $request['big_opis'];
            $name_option = $request['name_option'];
            $value_option = $request['value_option'];
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

            //update to product and get id_product
        DB::table('products')->where('id',$id_product)->update(
                ['articul' => $articul,
                'name' => $name_product,
                'new_prod' => $checked_new_prod,
                'top_sale' => $checked_top_sale,
                'description' => $big_opis,
                'price' => $price,
                'discount' => $discount,
                'zacupka' => $zakupka,
                'updated_at' => \Carbon\Carbon::now()
                ]);
        //update rest request
        DB::table('product_category')->where('id',$id_product)->update(
            ['id_category' => $category,
            'updated_at' => \Carbon\Carbon::now()
            ]);
        DB::table('product_quantity')->where('id',$id_product)->update(
            ['quantity' => $quantity,
            'updated_at' => \Carbon\Carbon::now()
            ]);
        //update option products
        for ($i=0; count($request['name_option']) > $i; $i++){
                $name_option = $request['name_option'][$i];
                $value_option = $request['value_option'][$i];

                DB::table('products_options')->where('id_product',$id_product)->update(
                    ['name_option' => $name_option,
                    'value_option' => $value_option,
                    'updated_at' => \Carbon\Carbon::now()
                    ]);
        }
        //add images
        if ($request->hasFile('picture')) {
            $pictures = DB::select('select image from  product_image  where id_product = ?', [$id_product ]);
            foreach ($pictures as $picture){
                if(File::exists(public_path($picture))){
                    File::delete(public_path($picture));
                }
            }
            $file = $request->file('picture');
                foreach ($file as $fil){
                    $ext = $fil->getClientOriginalExtension();
                    $filename = pathinfo($fil->getClientOriginalName(), PATHINFO_FILENAME);
                    $fileName = time() . '_' . $filename.'.'.$ext;
                    $filePath = $fil->storeAs('product_image/'.$articul.'', $fileName, 'public');
                    DB::table('product_image')->where('id',$id_product)->update(
                        ['image' => $filePath]);
                }
            }
        }



        $products = Product::with('productImages')->with('productQuantety')->with('productOptions')->with('productCategory')->find($id_product);
        $user_login = Auth::user();
        $categories = Category::all();
        return view('admin/update_products', [
            'user_login'=>$user_login,
            'products'=>$products,
            'categories'=>$categories
        ]);
    }


    public function deleteProduct(Request $request, Product $product){

        $id_product = request()->id;

        $product = Product::with('productImages')->with('productQuantety')->with('productOptions')->with('productCategory')->find($id_product);

        $product->productQuantety()->delete();
        $product->productCategory()->delete();
        $product->productOptions()->delete();
        $image = $product->productImages;
        if(is_file(storage_path('app/public/'.$image))){
            unlink(storage_path('app/public/'.$image));
        }
        $product->productImages()->delete();
        //delete from database
        $product->delete();

        $user_login = Auth::user();
        $products = Product::with('productCategory')->with('productImages')->with('productQuantety')->get();
        $categorys = Category::all();
        return redirect()->route('products', [
            'user_login'=>$user_login,
            'products'=>$products,
            'categorys'=>$categorys
        ]);

    }
}
