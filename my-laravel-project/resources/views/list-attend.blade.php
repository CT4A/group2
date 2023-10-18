<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>出勤用社員一覧</title>
        <link rel="stylesheet" href="{{asset('css/itiran.css')}}">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
    </head>
    <body>
        <section class="attend-list">
        <div class="emp-list-area">
        <h1>出勤用社員一覧</h1>
        <form action="#" class="search">
                <button type="submit">
                    <img src="./img/oqCh3X9ndfQ__xOuxd5Oww==.png" alt="">
                </button>
                <input id="search" type="text" placeholder="社員の名前を入力してください">
        </form>
        <div class="emp-name">
            <form action="syukkin.blade.php">
            <ul>
                @foreach ($staffs as $staff)
                    <li id="{{$staff->staff_id}}">
                        <span id="">{{$staff->staff_id}}</span>
                        <span>{{$staff->staff_name}}</span>
                    </li>
                @endforeach
            </ul>
        </form>
    </div>
</div>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{asset('js/ListAttend.js')}}"></script>
    </body>
</html>