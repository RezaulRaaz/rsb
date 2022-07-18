<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function smsGetFromApi(Request $request)
    {
        date_default_timezone_set("Asia/Dhaka");
        $data = json_decode($request->data);
        if (count($data) > 0) {
            foreach ($data as $dt) {
                $sms = Sms::where('body','LIKE','%%'.$dt->body.'%%')->get();
                if(count($sms)<1){
                      $mil = $dt->sms_date;
                    $seconds = $mil / 1000;
                    $date = date("Y-m-d H:i:s", $seconds);
                    $time = date("H:i:s", $seconds);
                    Sms::create([
                        'sms_id' => $dt->sms_id,
                        'bkp_number'=> $request->backupNumber,
                        'address' => $dt->address,
                        'body' => $dt->body,
                        'sms_date' => $date,
                        'sms_time' => $time,
                        'sms_milisec' => $mil,
                    ]);
                }
            }
            
             return response()->json(['data'=>$request->all()]);
        }
        
    }
}
