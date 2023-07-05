@extends('main')
@yield('title','パスワード変更')
@section('styles')
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
<main>
    <section class="register">
        <div class="register-area">
            <h1>パスワード変更</h1>
            <ul>
                <div class="message text-center">
                    <div class="alert alert-primary" role="alert">
                        <strong>{{session('message')}}</strong>
                    </div>
                </div>
                <form action="/emp-register" method="POST">
                @csrf
                <li class="passList">
                    <span>現在のパスワード</span>
                    <input type="text" name="now_password" required>
              
                </li>
                <li class="passList">
                    <span>新規パスワード</span>
                    <input type="text" name="new_password" required>
                   
                </li>
                <li class="passList">
                    <span>新規パスワード[確認]</span>
                    <input type="text" name="new_passwordConf" required>
                  
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