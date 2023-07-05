@extends('main')
@yield('title','出勤退勤履歴')
@section('styles')
<link rel="stylesheet" href="./css/history.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
    <section class="history">
        <div class="history_item">
            <figure class="history-date">
            <a href="" class="calendar_item"><img src="/img/calendar.webp" alt=""></a>
            <time datetime="2023-01">2023年1月</time>
        </figure>
            <h1 id="staff_name">{{$staff_name->staff_name}}</h1>
        </div>
            @foreach ($staffs as $staff)
            <div class="history_info">
                <div class="history_info_item">
                    <time datetime="2023-01">{{$staff->work_date}}</time>
                    <div>
                        <span class="">{{$staff->attend_time}}出勤</span>
                        <span class="">{{$staff->leaving_work}}退勤</span>
                    </div>
                </div>
                <div class="history_info_btn">
                    <button name="editbtn">編集</button>
                    <button name="delbtn">削除</button>
                </div>
            </div>
            <div class="history_info">
                <div class="history_info_item">
                    <time datetime="2023-01">{{$staff->work_date}}</time>
                    <div>
                        <span class="">{{$staff->attend_time}}出勤</span>
                        <span class="">{{$staff->leaving_work}}退勤</span>
                    </div>
                </div>
                <div class="history_info_btn">
                    <button name="editbtn">編集</button>
                    <button name="delbtn">削除</button>
                </div>
            </div>
            <div class="history_info">
                <div class="history_info_item">
                    <time datetime="2023-01">{{$staff->work_date}}</time>
                    <div>
                        <span class="">{{$staff->attend_time}}出勤</span>
                        <span class="">{{$staff->leaving_work}}退勤</span>
                    </div>
                </div>
                <div class="history_info_btn">
                    <button name="editbtn">編集</button>
                    <button name="delbtn">削除</button>
                </div>
            </div>
            @endforeach
    </section>
@endsection
@section('scripts')
<script src ="js/infomation.js"></script>
<script src="js/index.js"></script>
</body>
@endsection