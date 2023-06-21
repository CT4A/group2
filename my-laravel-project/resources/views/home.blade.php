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
            
                @if ($customerDatas->isEmpty())
                    <p>イベントがありません。</p>
                @else
                    @foreach ($customerDatas as $customerData)
                    <div class="row eventheader">
                        <div class="col-sm-4 col-4">
                            <div class="card-body  bgorgi">
                                <div class="text-center"><h4>{{$customerDatas[0]->customer_name}}</h4></div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-4">
                            <div class="card-body schedule">
                                <div class="schedule text-center"><h4>{{$customerDatas[0]->birthday}}</h4></div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-4">
                            <div class="card-body event">
                                <div class="event text-center"><h4>誕生日</h4></div>
                            </div>
                        </div>
                    </div>
                    @endforeach  
                @endif
        </div>
    </div>
</div>
@endsection
@section('scripts')
    
@endsection