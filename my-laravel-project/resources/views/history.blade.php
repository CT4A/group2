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
            </figure>
            <figcaption>
            <time datetime="2023-01">2023年1月</time>
            <h1 id="staff_name">{{$staff_name->staff_name}}</h1>
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
                <div class="history_info_btn">
                    <div class="history_info_btn-field">
                        <button name="editbtn">編集</button>
                        <button name="delbtn">削除</button>
                    </div>
                </div>
            </div>
            @endforeach
    </section>
@endsection
@section('scripts')
<script src ="js/infomation.js"></script>
<script src ="js/History.js"></script>
</body>
@endsection