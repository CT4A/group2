@extends('main')
@yield('title','予約')
@section('styles')
    
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
<main>
    <section class="register">
        <div class="register-area">
            <h1>予約</h1>
            <ul>
                <form action="" method="POST">
                    <li>
                        <span>人数</span>
                        <input type="text" name="reserve_people">
                    </li>
                    <li>
                        <span>顧客名</span>
                        <input type="text" name="customer"> <!-- customer_id????? -->
                    </li>
                    <li>
                        <span>担当者</span>
                        <input type="text" name="staff_id">
                    </li>
                    <li>
                        <span>日時</span>
                        <input type="text" name="time">
                    </li>
                    <li>
                        <span>備考</span>
                        <textarea name="remarks" id="" ></textarea>
                    </li>
                <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
</main>
@endsection
@section('scripts')
<script src="js/register.js"></script>
<script src="js/index.js"></script>
@endsection