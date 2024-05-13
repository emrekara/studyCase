<?php

namespace App\Console\Commands;

use App\Models\Currencies;
use App\Models\CurrenciesApi;
use App\Models\CurrenciesLogs;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class FetchCurrency extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'currency:fetch {action}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Exchange rate are be calculating.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $action = $this->argument('action');
        if (!in_array($action, ['min','max'])) {
            echo "Enter a valid action (min or max).";
            exit();
        }
        $calculateData=array();
        /*aktif olan apiler çekiliyor*/
        $rows=CurrenciesApi::where('status',1)->get();
        if ($rows){
            /*mevcut verilere zarar vermeden güncellemenin yapılabilmesi için begintransaction eklemesi yapıldı*/
            DB::beginTransaction();
            foreach ($rows as $row){
                /*Eklenen api servisi çağrılıyor*/
                if ($row["type"]=="json"){
                    $client = new Client();
                    $response = $client->get($row["url"]);
                    $data = json_decode($response->getBody(),true);
                }
                else{
                    $response=Http::get($row["url"]);
                    $data = json_decode(json_encode(simplexml_load_string($response)),true);
                }
                $var_path=explode('/',$row["var_path"]);/* / işaretine göre var_path için dizi oluşturuluyor*/
                if ($var_path){
                    foreach ($var_path as $path){
                        /*path yanlış taınmlanmış ise bulduğu kadarı ile devam eder*/
                        if (isset($data[$path])){
                            $data=$data[$path];
                        }
                    }
                }
                /*Kurların hangi eleman altında bulunduğunu yakalayıp data içerisinden bu toplu datayı çekiyoruz*/
                if ($data){
                    foreach ($data as $item){
                        if ($item[$row["data_name"]] && $item[$row["data_price"]] && $item[$row["data_symbol"]] && $item[$row["data_shortCode"]]){
                            /*geçmiş kur kayıtlarının görüntülenebilmesi için currencies logs modeline kayıt oluşturuluyor*/
                            $logs=new CurrenciesLogs();
                            $logs["api_id"]=$row["id"];
                            $logs["name"]=$item[$row["data_name"]];
                            $logs["code"]=$item[$row["data_shortCode"]];
                            $logs["symbol"]=$item[$row["data_symbol"]];
                            $logs["amount"]=(double)$item[$row["data_price"]];
                            $logs->save();
                            if (isset($calculateData[$logs["code"]])){
                                if ($action=="min"){
                                    if ($calculateData[$logs["code"]]["amount"]>=$logs["amount"]){
                                        $calculateData[$logs["code"]]=array(
                                            "api_id"=>$row["id"],
                                            "name"=>$logs["name"],
                                            "code"=>$logs["code"],
                                            "symbol"=>$logs["symbol"],
                                            "amount"=>(double)$logs["amount"],
                                        );
                                    }
                                }
                                elseif ($action=="max"){
                                    if ($calculateData[$logs["code"]]["amount"]<=$logs["amount"]){
                                        $calculateData[$logs["code"]]=array(
                                            "api_id"=>$row["id"],
                                            "name"=>$logs["name"],
                                            "code"=>$logs["code"],
                                            "symbol"=>$logs["symbol"],
                                            "amount"=>(double)$logs["amount"],
                                        );
                                    }
                                }
                            }
                            else{
                                $calculateData[$logs["code"]]=array(
                                    "api_id"=>$row["id"],
                                    "name"=>$logs["name"],
                                    "code"=>$logs["code"],
                                    "symbol"=>$logs["symbol"],
                                    "amount"=>(double)$logs["amount"],
                                );
                            }
                        }
                        else{
                            echo "No data was found in the specified field names.";
                        }
                    }
                }
            }
            /*currencies_logs a tüm veriler basıldıktan sonra $calculateData değişkeninde tanımlanan en küçük değerli kurları kaydediyoruz.*/
            if ($calculateData){
                foreach ($calculateData as $code => $cal_item) {
                    Currencies::updateOrCreate(['code' => $code], $cal_item);
                }
            }
            DB::commit();
            echo 'Currencies Api complete successfully';
        }
        else{
            echo 'Currencies Api data not found';
        }
    }
}
