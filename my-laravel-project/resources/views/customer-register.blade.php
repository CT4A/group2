@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset("css/register.css")}}">
<link rel="stylesheet" href="{{asset("css/information.css")}}">
@endsection


@yield('title','社員一覧')
@section('content')
    <section class="register">
            <div class="register-area">
                <h1>出勤登録画面</h1>
                <ul>
                    <form action="" method="POST">
                    <li>
                        <span>人数</span>
                        <input type="text" name="end_time">
                    </li>
                    <li>
                        <span>担当者</span>
                        <input type="text" name="start_time">
                    </li>
                    <li>
                        <span>日時</span>
                        <input type="time" name="start_time"  min="09:00" max="17:00" >
                    </li>
                    <li>
                        <span>顧客名1</span>
                        <input type="text" name="end_time">
                    </li>
                    <p class="plus">入力項目追加</p>
                    <input type="submit">
                    </form>
                </ul>
            </div>
        </section>
    
@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
@endsection
