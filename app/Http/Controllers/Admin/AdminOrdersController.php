<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminOrdersController extends Controller
{
    public function index(){
        $user_login = Auth::user();
        return view('admin/orders', ['user_login'=>$user_login]);
    }
}
