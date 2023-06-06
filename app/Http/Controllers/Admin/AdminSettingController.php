<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_login = Auth::user();
        $settings = Setting::get();
        $categorys = Category::get();

        return view('admin/setting', ['user_login'=>$user_login, 'settings'=>$settings, 'categorys'=>$categorys]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->isMethod('post')){
            //dd($request);
            //all_setting
            if (isset($request['all_setting'])){
                //dd($request['all_setting']);
                $this->validate($request, [
                    'phone' => 'required',
                    'email' => 'required',
                    'adres' => 'required'
                ]);


                //dd($request['phone']);
                $check_if_exist =  DB::table('settings')->get();
                if($check_if_exist->isEmpty()){
                    DB::table('settings')->insert(
                        ['phone' => $request['phone'],
                        'email' => $request['email'],
                        'title' => $request['title'],
                        'adres' => $request['adres'],
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
                }else{
                    DB::table('settings')->update(
                        ['phone' => $request['phone'],
                        'email' => $request['email'],
                        'title' => $request['title'],
                        'adres' => $request['adres'],
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
                }
                $user_login = Auth::user();
                $settings = Setting::get();
                $categorys = Category::get();

                return view('admin/setting', ['user_login'=>$user_login, 'settings'=>$settings, 'categorys'=>$categorys]);
            }
            if (isset($request['information_block'])){
                //dd($request['phone']);
                $check_if_exist =  DB::table('settings')->get();
                if($check_if_exist->isEmpty()){
                    DB::table('settings')->insert(
                        ['about_us' => $request['about_us'],
                        'contact_us' => $request['contact_us'],
                        'privacy_policy' => $request['privacy_policy'],
                        'orders_returns' => $request['orders_returns'],
                        'terms_conditions' => $request['terms_conditions'],
                        'created_at' => \Carbon\Carbon::now(),
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
                }else{
                    DB::table('settings')->update(
                        ['about_us' => $request['about_us'],
                        'contact_us' => $request['contact_us'],
                        'privacy_policy' => $request['privacy_policy'],
                        'orders_returns' => $request['orders_returns'],
                        'terms_conditions' => $request['terms_conditions'],
                        'updated_at' => \Carbon\Carbon::now()
                    ]);
                }
                $user_login = Auth::user();
                $settings = Setting::get();
                $categorys = Category::get();

                return view('admin/setting', ['user_login'=>$user_login, 'settings'=>$settings, 'categorys'=>$categorys]);
            }
            if (isset($request['category_baners'])) {
                $categorys = Category::get();
                    DB::table('categorys')->update(['show_baners' => 0]);
                foreach ($request['category_baners'] as $category_baner){
                    //dd($category_baner);
                    DB::table('categorys')->where('id',$category_baner)->update(['show_baners' => 1]);
                }
                $user_login = Auth::user();
                $settings = Setting::get();
                $categorys = Category::get();

                return view('admin/setting', ['user_login'=>$user_login, 'settings'=>$settings, 'categorys'=>$categorys]);
            }
            if ($request->hasFile('picture')) {
                $file = $request->file('picture');


                        $ext = $file->getClientOriginalExtension();
                        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                        $fileName = time() . '_' . $filename.'.'.$ext;
                        $filePath = $file->storeAs('product_image/logo', $fileName, 'public');
                        DB::table('settings')->update(
                            [
                            'media-logo' => $filePath
                            ]);


                    $user_login = Auth::user();
                    $settings = Setting::get();
                    $categorys = Category::get();

                    return view('admin/setting', ['user_login'=>$user_login, 'settings'=>$settings, 'categorys'=>$categorys]);
                }
            if ($request->hasFile('baner_maine_proposition')) {
                    $file = $request->file('baner_maine_proposition');


                            $ext = $file->getClientOriginalExtension();
                            $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                            $fileName = time() . '_' . $filename.'.'.$ext;
                            $filePath = $file->storeAs('product_image/banerMaineProposition', $fileName, 'public');
                            DB::table('settings')->update(
                                [
                                'baner_maine_proposition' => $filePath,
                                'text_maine_proposition' => $request['text_baners_maine_proposition']
                                ]);


                        $user_login = Auth::user();
                        $settings = Setting::get();
                        $categorys = Category::get();

                        return view('admin/setting', ['user_login'=>$user_login, 'settings'=>$settings, 'categorys'=>$categorys]);
                    }
        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     */
    public function addMadia(Request $request){

    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }
}
