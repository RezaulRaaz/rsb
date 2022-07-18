<?php

namespace App\Http\Controllers;

use App\Models\Sms;
use Illuminate\Http\Request;

use function GuzzleHttp\Promise\all;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
       return redirect()->route('search');
    }
    public function search(Request $request){
        // dd($request->all());
        $sms=null;
        $start=date('Y-m-d');
        $end=date('Y-m-d');
        
        if($request->date_start & $request->date_end){
            $start=date('Y-m-d H:i:s',strtotime($request->date_start));
            $end=date('Y-m-d H:i:s',strtotime($request->date_end));
            if($request->tranx_id){
              $sms= Sms::where('address',$request->type)
                ->where('bkp_number',$request->number)
                ->where('body','like',"%$request->tranx_id%")
                ->orderBy('sms_milisec','ASC')
                ->get();  
            }elseif($request->sender_number){
                $sms= Sms::where('address',$request->type)
                ->whereBetween('sms_date',[$start,$end])
               ->where('body','like',"%$request->sender_number%")
                ->where('bkp_number',$request->number)
                ->orderBy('sms_milisec','ASC')
                ->get();
            }else{
                
                $sms= Sms::where('address',$request->type)
                ->whereBetween('sms_date',[$start,$end])
                ->where('bkp_number',$request->number)
                ->orderBy('sms_milisec','ASC')
                ->get();
          }
        }
        $numbers= Sms::orderBy('bkp_number','ASC')->get()->groupBy('bkp_number');
        return view('welcome',compact('sms','start','end','numbers'));
    }
}
