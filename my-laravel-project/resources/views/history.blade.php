@php
    $today = new Datetime();
@endphp
@extends('main')
@section('title','出勤退勤履歴')
@section('styles')
<link rel="stylesheet" href="./css/history.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
    <section class="history">
    <!-- <div id="History-Graph"> -->
    <!-- <canvas id = "graph"></canvas>
    </div> -->
        <div class="history_item">
            <figure class="history-date">
                <a href="" class="calendar_item"><img src="/img/calendar.webp" alt=""></a>
            </figure>
            <figcaption>
            <h1 datetime="2023-01">{{ $today->format('Y-m') }}</h1>
            <h2 id="staff_name" data-id={{ auth()->user()->staff_id }}>{{$staff_name->staff_name}}</h2>
            </figcaption>
        </div>
            @foreach ($staffs as $staff)
            <div class="history_info">
                <div class="history_info_item">
                    <time datetime="2023-01">{{$staff->work_date}}</time>
                    <div>
                        <span class="">出勤{{$staff->attend_time}}</span>
                        <span class="">退勤{{$staff->leaving_work}}</span>
                    </div>
                </div>
                @if (Auth::user()->isAdmin())
                <div class="history_info_btn">
                    <div class="history_info_btn-field">
                        <button id="editbtn"><a href="{{route('indexHistoryEditor')}}">編集</a></button>
                        <button id="delbtn">削除</button>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
    </section>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
<script src ="js/infomation.js"></script>
<script src ="js/History.js"></script>
<script src ="js/Historygraph.js"></script>
</body>
@endsection