<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function smsGetFromApi(Request $request)
    {
        /* Dummy Data Generate 
            $data = [];
            for($i=1;$i<=25000;$i++){
                array_push($data, [
                    "sms_id" => $i,
                    "address" => "Dhaka".$i,
                    "body" => "Cash In Tk 500.00 from 01777606562 successful. Fee Tk 0.00. Balance Tk 505.06. TrxID 9GG3ORCJWJ at 16/07/2022 19:45. Download App: https://bKa.sh/8app".$i,
                    "sms_date" => strtotime(date('Y-m-d H:i:s')),
                ]);
            }
        */

        date_default_timezone_set("Asia/Dhaka");
        $data = json_decode($request->data, true);
        $smsBank = [];
        if (count($data) > 0) {
            foreach ($data as $dt) {
                if(Sms::where('body','LIKE','%%'.$dt['body'].'%%')->count() == 0){
                    array_push($smsBank, [
                        'sms_id' => $dt['sms_id'],
                        'bkp_number'=> $request->backupNumber,
                        'address' => $dt['address'],
                        'body' => $dt['body'],
                        'sms_date' => date("Y-m-d H:i:s", ($dt['sms_date'] / 1000)),
                        'sms_time' => date("H:i:s", ($dt['sms_date'] / 1000)),
                        'sms_milisec' => $dt['sms_date'],
                    ]);
                }
            }

            if(isset($smsBank[0])){
                foreach (array_chunk($smsBank, 1000) as $bank) {
                    Sms::insert($bank); 
                }
            }
            
            return response()->json([
                'data' => $smsBank
            ]);
        }

        return response()->json([
            'data' => []
        ]);
    }
}
