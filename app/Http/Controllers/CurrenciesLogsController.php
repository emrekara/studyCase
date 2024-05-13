<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\CurrenciesLogs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;

class CurrenciesLogsController extends Controller
{
    //
    public function __construct()
    {
        View::share('page_title','Currencies Logs');
        View::share('page_topLink', route('admin.currencies_logs.index'));
    }

    public function index(Request $request){
        $list=CurrenciesLogs::orderBy('id','desc')->paginate(20)
            ->appends($request["page"]);
        return view("admin.currencies_logs.index",compact('list'));
    }
}
