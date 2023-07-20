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
            <form action="/emp-register" method="POST">
            <ul class="register-areaUL">
                <div class="message text-center">
                    <div class="alert alert-primary" role="alert">
                        <strong>{{session('message')}}</strong>
                    </div>
                </div>
                @csrf
                <li class="passList">
                    <span>現在のパスワード</span>
                    <input type="password" name="now_password" required>
              
                </li>
                <li class="passList">
                    <span>新規パスワード</span>
                    <input type="password" name="new_password" required>
                   
                </li>
                <li class="passList">
                    <span>新規パスワード[確認]</span>
                    <input type="password" name="new_passwordConf" required>
                  
                </li>
                <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/register.js"></script>
@endsection