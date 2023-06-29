@extends('main')
@yield('title','パスワード変更')
@section('styles')
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
    <section class="register">
        <div class="register-area">
            <h1>パスワード変更</h1>
            <ul>
                <form action="/emp-register" method="POST">
                    @csrf
                <li class="passList">
                    <span>現在のパスワード</span>
                    <input type="text" name="now_password" required>
                    <span></span>
                </li>
                <li class="passList">
                    <span>新規パスワード</span>
                    <input type="text" name="new_password" required>
                    <span></span>
                </li>
                <li class="passList">
                    <span>新規パスワード[確認]</span>
                    <input type="text" name="new_passwordConf" required>
                    <span></span>
                </li>
                <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/register.js"></script>
<script src="js/index.js"></script>
@endsection