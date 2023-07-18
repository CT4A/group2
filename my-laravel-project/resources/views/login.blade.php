<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('bootstrap-4.0.0-dist\css\bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css\login.css')}}">
    <title>ログイン</title>
</head>

<body>
    <div class="container-fluid main">
        <div class="loginBox p-4">
            <div class="loginBox-main">
                <div class="TextHeader text-center">
                    <h1><strong>ログイン</strong></h1>
                </div>
                @if (session('message'))
                {{session('message')}}
                @endif
                <form action="/login" method="post">
                    @csrf
                    <div class="inputArea">
                        <div class="userIdArea">
                            <input type="text" name="tel" id="" placeholder="電話番号:080-999-999">
                            <img src="{{asset('img/t.webp')}}" alt="">
                        </div>
                        @if ($errors->has('tel'))
                        <span class="error">{{ $errors->first('tel') }}</span>
                        @endif
                        <div class="passArea">
                            <input type="password" name="password" id="" placeholder="パスワード">
                            <img src="{{asset('img/lock.png')}}" alt="">
                        </div>
                        @if ($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="button"><input class="btn btn-primary btnlogin" type="submit" value="ログイン"></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>