<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>ログインページ</title>
    {{-- login.css --}}
    <link rel="stylesheet" href="{{asset('css/login.css')}}">
    {{-- boostrap css --}}
    <link rel="stylesheet" href="{{asset('css/bootstrap-4.0.0-dist/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-4.0.0-dist/css/bootstrap-grid.css')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap-4.0.0-dist/css/bootstrap-reboot.css')}}">
</head>
<body>
    <div class="containt">
        <div class="main">
            <div class="main-login">
                <div class="founder-text"><span>ログイン</span></div>
                <div class="login-form">
                    <form action="{{route('login')}}" method="post">
                        @csrf
                        <div class="account-row row">
                            <div class="id-input">
                                <input type="text" name="id" id="id" placeholder="ユーザーID">
                                <div class="icon">
                                    <img src="{{asset(('images/loginImages/id.png'))}}" alt="account-icon">
                                </div>
                            </div>
                        </div>
                        <div class="password-row row">
                            <div class="password-input">
                                <input type="password" name="password" id="password" placeholder="パスワード">   
                            <div class="icon">
                                <img src="{{asset(('images/loginImages/password.svg'))}}" alt="account-icon">
                            </div>
                            </div> 
                        </div>
                        <div class="button">
                            <input type="submit" value="ログイン">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>