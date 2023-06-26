@extends('main')
@yield('title','Home')
@section('styles')
<link rel="stylesheet" href="{{asset('css/home.css')}}">
@endsection
@section('content')
<div class="container-fluid">
    <main>
        <section class="row header">
            <h1 class="col-4 eventHeaderColor">イベントリスト</h1>
            <div class="ImgBtn">
            <a class="calendarBtn" href="#"><img src="/img/calendar.webp" alt=""></a>
            <a class="imgLetter" href="#"><img src="{{asset('img\letterIcon.webp')}}" alt="letter icon"></a>
            </div>
        </section>
        <section class="mainTable">
            <div class="row headerTable">
                <div class="event-eleent">
                    <h4>名前</h4>
                </div>
                <div class="event-eleent">
                    <h4>スケジュール</h4>
                </div>
                <div class="event-eleent">
                    <h4>イベント</h4>
                </div>
            </div>
            <div class="row">
            <div class="event-eleent">
                    <h4>Aさん</h4>
                </div>
                <div class="event-eleent">
                    <h4>5月</h4>
                </div>
                <div class="event-eleent">
                    <h4>誕生日</h4>
                </div>
            </div>
            <div class="row">
            <div class="event-eleent">
                    <h4>Aさん</h4>
                </div>
                <div class="event-eleent">
                    <h4>5月</h4>
                </div>
                <div class="event-eleent">
                    <h4>誕生日</h4>
                </div>
            </div>
            <div class="row">
            <div class="event-eleent">
                    <h4>Aさん</h4>
                </div>
                <div class="event-eleent">
                    <h4>5月</h4>
                </div>
                <div class="event-eleent">
                    <h4>誕生日</h4>
                </div>
            </div>
            <div class="row">
            <div class="event-eleent">
                    <h4>Aさん</h4>
                </div>
                <div class="event-eleent">
                    <h4>5月</h4>
                </div>
                <div class="event-eleent">
                    <h4>誕生日</h4>
                </div>
            </div>
            <div class="row">
            <div class="event-eleent">
                    <h4>Aさん</h4>
                </div>
                <div class="event-eleent">
                    <h4>5月</h4>
                </div>
                <div class="event-eleent">
                    <h4>誕生日</h4>
                </div>
            </div>

                @if ($customerDatas->isEmpty())
                    <p>イベントがありません。</p>
                @else
                    @foreach ($customerDatas as $customerData)
                    <div class="row eventheader">
                        <div class="">
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
        </section>
    </main>
</div>
@endsection
@section('scripts')
    
@endsection