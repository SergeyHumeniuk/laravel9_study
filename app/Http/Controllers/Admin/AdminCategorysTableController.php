<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;

class AdminCategorysTableController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     */
    public function __invoke()
    {
        $category_name = Category::all();
        return $category_name;

    }
}
