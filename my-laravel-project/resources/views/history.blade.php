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
    <div id="History-Graph" style="width:80%;height:100%">
    <canvas id = "graph" ></canvas>
    </div> 
        <div class="history_item">
            <figure class="history-date">
                <a href="{{ route('HistoryEditView') }}" class="calendar_item">変更履歴</a>
            </figure>
            <figcaption>
            <h1 datetime="$progressdate" class="history-data"><a href="HistoryBack?date={{ $progressdate }}&$id={{$staff_name->staff_id}}" >←</a>{{ $progressdate }}<a href="HistoryNEXT?date={{ $progressdate}}&$id={{$staff_name->staff_id}}">→</a></h1>
            <h2 id="staff_name" data-id={{$staff_name->staff_id}}>{{$staff_name->staff_name}}</h2>
            </figcaption>
        </div>
        @if ($staffs->isEmpty())
                    <p class="HistoryEmp">履歴はありませんでした。</p>
                @endif
            @foreach ($staffs as $staff)
            <div class="history_info">
                <div class="history_info_item">
                    <time datetime="$progressdate">{{$staff->work_date}}</time>
                    <div>
                        <span class="">出勤{{$staff->attend_time}}</span>
                        <span class="">退勤{{$staff->leaving_work}}</span>
                    </div>
                </div>
                @if (Auth::user()->isAdmin())
                <div class="history_info_btn">
                    <div class="history_info_btn-field">
                        <button class="editbtn"><a href="{{route('indexHistoryEditor',['id' => $staff_name->staff_id, 'work_date' => $staff->work_date])}}">編集</a></button>
                        <button class="delbtn">削除</button>
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