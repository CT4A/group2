@extends('main')
@yield('title','社員登録')
@section('styles')
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
<main>
    <section class="register">
        <div class="register-area">
            <h1>社員新規作成</h1>
            <ul>
                <form action="/emp-register" method="POST">
                    @csrf
                <li>
                    <span>社員名</span>
                    <input type="text" name="staff_name">
                </li>
                <li>
                    <span>電話番号</span>
                    <input type="text" name="tel">
                </li>
                <li>
                    <span>住所</span>
                    <input type="text" name="residence">
                </li>
                <li>
                    <span>誕生日</span>
                    <input type="text" name="birthday">
                </li>
                <li>
                    <span>時給</span>
                    <input type="text" name="hourly_wage">
                </li>
                <li>
                    <span>備考</span>
                    <textarea name="remarks" ></textarea>
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