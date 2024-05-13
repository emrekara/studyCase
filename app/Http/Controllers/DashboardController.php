<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    //
    public function __construct()
    {
        View::share('page_title','Dashboard');
    }

    //
    public function index(Request $request){
        if(Auth::guard('admin')->check()){
            $cur_rows=Currencies::all();
            return view('admin.dashboard.index',compact('cur_rows'));
        }else{
            return redirect()->route('admin.login');
        }
    }
}
