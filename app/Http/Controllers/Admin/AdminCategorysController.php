<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminCategorysController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        $user_login = Auth::user();
        $category_name = Category::get();
        return view('admin/category', [
            'category_name'=>$category_name,
            'user_login'=>$user_login
        ]);

    }
    /**
     *
     */
    public function getCategory()
    {
        $user_login = Auth::user();
        $category_name = Category::all();
        return $category_name;

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return Request
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            $this->validate($request, [
                'name_category' => 'required'
            ]);
        if ($request->hasFile('picture')) {
        $file = $request->file('picture');
        $ext = $file->getClientOriginalExtension();
        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = time() . '_' . $filename.'.'.$ext;
        $filePath = $file->storeAs('category_image', $fileName, 'public');
        }

        //save in database
        $name_category = $request['name_category'];
        $Category = new Category();
        $Category->name = $name_category;
        $Category->image = $filePath;
        $Category->save();
        }

        $user_login = Auth::user();
        $category_name = Category::get();
        /*return view('admin/category', [
            'category_name'=>$category_name,
            'user_login'=>$user_login
        ]);*/
        return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     */
    public function destroy(Request $request, Category $category)
    {
        $id_category = $request['delete_category'];
        $Category = Category::find($id_category);

        //delete file
        $image = $Category->image;
        //dd($image);
        if(is_file(storage_path('app/public/'.$image))){
            unlink(storage_path('app/public/'.$image));
        }

        //delete from database
        $Category->delete();

        $user_login = Auth::user();
        $category_name = Category::get();
        return $request;
    }
}
