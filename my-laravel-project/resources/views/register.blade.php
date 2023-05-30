@extends('main')
@yield('title','register')
@section('styles')
<link rel="stylesheet" href="{{asset('css/register.css')}}">
<link rel="stylesheet" href="{{asset('css/information.css')}}">
@endsection
@section('content')
<section class="register">
    <div class="register-area">
        <h1>出勤登録画面</h1>
        <ul>
            <form action="" method="POST">
            <li>
                <span>開始時間</span>
                <input type="time" name="start_time">
            </li>
            <li>
                <span>終了時間</span>
                <input type="time" name="end_time">
            </li>
            <li>
                <input type="checkbox" name="time" id="checkbox">
                <span>同伴がある場合はこちらをチェックしてください。</span>
            </li>
            <ol class="close">
                <li>
                    <span>人数</span>
                    <input type="text" name="reserve_people">
                </li>
                <li>
                    <span>顧客数</span>
                    <input type="text" name="time">
                </li>
                <li>
                    <span>同伴名</span>
                    <input type="text" name="time">
                </li>
                <li>
                    <span>出勤者名</span>
                    <input type="text" name="time">
                </li>
            </ol>
            <input type="submit">
            </form>
        </ul>
    </div>
</section>
@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
@endsection