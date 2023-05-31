@extends('main')
@yield('title','Home')
@section('styles')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection
@section('content')
<div class="container-fluid">
    <div class="main">
        <div class="row header">
            <div class="col-4"></div>
            <div class="col-4 eventHeaderColor">イベントリスト</div>
            <div class="col-4 imgLetter"><img src="{{asset('img\letterIcon.webp')}}" alt="letter icon"></div>

        </div>
        <div class="mainTable">
            <div class="row headerTable">
                <div class="col-sm-4 col-4">
                    <div class="card-body bgorgi">
                        <div class="bgorgi text-center"><h4>名前</h4></div>
                    </div>
                </div>
                <div class="col-sm-4 col-4">
                    <div class="card-body schedule">
                        <div class="schedule text-center"><h4>スケジュール</h4></div>
                    </div>
                </div>
                <div class="col-sm-4 col-4">
                    <div class="card-body event">
                        <div class="event text-center"><h4>イベント</h4></div>
                    </div>
                </div>
            </div>

            <div class="row contentTable">
                @foreach ($customerDatas as $customerData)
                    <div class="col-sm-4 col-4 ">
                        <div class="card-body bgorgi">
                            <div class="bgorgi text-center">{{$customerData->customer_name}}</div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4">
                        <div class="card-body content">
                            <div class="content text-center">{{$customerData->birthday}}</div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4">
                        <div class="card-body content">
                            <div class="content text-center">誕生日</div>
                        </div>
                    </div>
                @endforeach 
            </div>
        </div>

    </div>
</div>

    
@endsection
@section('scripts')
    
@endsection