@extends('master')

@section('content')
    <div class="search_area">
        <form action="{{'/search'}}" method="GET">
            <div class="form-group d-flex">
                <input type="date" name="date_start" value="{{date('Y-m-d',strtotime($start))}}" class="form-control" id="datepicker" aria-describedby="emailHelp">
                &nbsp;
                <input type="date" name="date_end" value="{{date('Y-m-d',strtotime($end))}}" class="form-control" id="datepicker" aria-describedby="emailHelp">
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div>
                         <div class="form-group d-flex">
                            <select name="type" class="form-control" id="exampleFormControlSelect1">
                                    <option value="bkash">Bkash</option>
                                    <option value="Nagad">Nagad</option>
                                    <option value="16216">Rocket</option>
                            </select>
                            &nbsp;
                            <select name="number" class="form-control" id="exampleFormControlSelect1">
                                    @foreach($numbers as $number=>$num)
                                        <option>{{$number}}</option>
                                    @endforeach
                            </select>
                        </div>
                        
                    </div>
                    <div class="form-group d-flex">
                        <input type="text" placeholder="Trx ID" name="tranx_id" class="form-control" id="trans_id" aria-describedby="emailHelp">
                         &nbsp;
                        <input type="text" placeholder="Sender" name="sender_number" class="form-control" id="sender_number" aria-describedby="emailHelp">
                        
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </div>

            </div>
        </form>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <p class="text-center">{{date('d-m-y',strtotime($start))}}-To-{{date('d-M-y',strtotime($end))}}</p>
            @if($sms)
                @foreach ($sms as $smse)
                    <div class="sms">
                        <p style="font-weight: bold">{{$smse->address}}</p>
                        <p>{{$smse->body}}</p>
                        <p>Date:- {{date('d-M-y H:i:s',strtotime($smse->sms_date))}}</p>
                    </div>
                @endforeach
            @endif

        </div>
    </div>
@endsection
