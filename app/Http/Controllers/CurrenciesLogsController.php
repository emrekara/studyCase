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
        $list=CurrenciesLogs::orderBy('id','asc')->paginate(20)
            ->appends($request["page"]);
        return view("admin.currencies_api.index",compact('list'));
    }

    public function create(){
        return view("admin.currencies_logs.create");
    }

    public function createPost(Request $request){
        $valid=Validator::make($request->all(),[
            'name'=>'required',
            'url'=>'required',
            'type'=>'required',
            'status'=>'required',
        ],$this->validateMessages());
        if ($valid->fails()){
            foreach ($valid->errors()->all() as $message){
                toastr()->error($message);
            }
            return back()->withInput();
        }else{
            try{
                DB::beginTransaction();
                $row=new CurrenciesLogs();
                $row["name"]=$request["name"];
                $row["url"]=$request["url"];
                $row["type"]=$request["type"];
                $row["status"]=$request["status"];
                $row["var_path"]=$request["var_path"];
                $row->save();
                DB::commit();
                toastr()->success('Registration Successful');
                return redirect()->route('admin.currencies_logs.index');
            }catch (\Exception $e){
                DB::rollBack();
                toastr()->error($e->getMessage());
                return back()->withInput();
            }
        }
    }

    public function update($id){
        $row=CurrenciesLogs::find($id);
        if(isset($row)){
            return view("admin.currencies_logs.update",compact('row'));
        }else{
            return redirect()->back();
        }
    }

    public function updatePost(Request $request,$id){
        $valid=Validator::make($request->all(),[
            'name'=>'required',
            'url'=>'required',
            'type'=>'required',
            'status'=>'required',
        ],$this->validateMessages());
        if ($valid->fails()){
            foreach ($valid->errors()->all() as $message){
                toastr()->error($message);
            }
            return back()->withInput();
        }else{
            try{
                DB::beginTransaction();
                $row=CurrenciesLogs::find($id);
                if ($row){
                    $row["name"]=$request["name"];
                    $row["url"]=$request["url"];
                    $row["type"]=$request["type"];
                    $row["status"]=$request["status"];
                    $row["var_path"]=$request["var_path"];
                    $row->save();
                }
                DB::commit();
                toastr()->success('Update Successful');
                return redirect()->route('admin.currencies_logs.index');
            }catch (\Exception $e){
                DB::rollBack();
                toastr()->error($e->getMessage());
                return back()->withInput();
            }
        }
    }

    public function delete(Request $request,$id){
        try{
            DB::beginTransaction();
            $row=CurrenciesLogs::find($id);
            if($row){
                CurrenciesLogs::destroy($id);
                toastr()->success('Successfully Deleted');
            }
            DB::commit();
        }catch (\Exception $e){
            toastr()->error(sprintf(__('general.deleted_error'),$e->getMessage()));
            DB::rollBack();
        }
        return redirect()->back();
    }

    public function indexPost(Request $request){
        if ($request->get('selectedDelete')){
            foreach ($request->get('id') as $id){
                $this->delete($request,$id);
            }
        }
        return redirect()->back();
    }

    public function validateMessages()
    {
        return [
            'name.required'=>'Name field is required',
            'url.required'=>'Url field is required',
            'type.required'=>'Type field is required',
            'status.required'=>'Name field is required',
        ];
    }
}
