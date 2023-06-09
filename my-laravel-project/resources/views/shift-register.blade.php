@extends('main')
@yield('title','register')
@section('styles')
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
<main>
    <section class="register">
        <div class="register-area">
            <h1>シフト登録</h1>
            <ul>
                <form action="" method="POST">
                <li>
                        <span>出勤者名</span>
                        <input type="text" name="staff_name">
                        <input type="text" name="staff_id" hidden>
                    </li>
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
                        <input type="text" name="">
                    </li>
                    <!-- <li>
                        <span>顧客数</span>
                        <input type="text" name="customer_id">
                    </li> -->
                    <li>
                        <span>同伴人数</span>
                        <input type="text" name="num_people">    
                    </li>
                </ol>
                <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
</main>
@endsection
@section('scripts')
<script src="js/register.js"></script>
@endsection