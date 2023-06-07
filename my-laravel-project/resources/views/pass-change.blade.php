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
                    <span>現在のパスワード</span>
                    <input type="text" name="staff_name">
                </li>
                <li>
                    <span>新規パスワード</span>
                    <input type="text" name="staff_name" >
                </li>
                <li>
                    <span>新規パスワード[確認]</span>
                    <input type="text" name="staff_name">
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