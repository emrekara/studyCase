<?php

namespace App\Http\Controllers;

use App\Models\Currencies;
use App\Models\CurrenciesApi;
use App\Models\CurrenciesLogs;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FrontController extends Controller
{
    //
    public function index(Request $request){
        $cur_rows=Currencies::all();
        return view('home',compact('cur_rows'));
    }
}
