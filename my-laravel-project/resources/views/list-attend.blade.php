<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="UTF-8">
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>出勤用社員一覧</title>
        <link rel="stylesheet" href="{{asset('css/itiran.css')}}">
        <link rel="stylesheet" href="{{asset('css/syukkin.css')}}">
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
        <ul>
                <li><span id="">1</span><span id="">chin君です</span></li>
                <li><span id="">2</span><span id="">chin君です</span></li>
                <li><span id="">3</span><span id="">chin君です</span></li>
                <li><span id="">4</span><span id="">chin君です</span></li>
                <li><span id="">5</span><span id="">chin君です</span></li>
                <li><span id="">6</span><span id="">chin君です</span></li>
        </ul>
    </div>
</div>
        </section>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    </body>
</html>