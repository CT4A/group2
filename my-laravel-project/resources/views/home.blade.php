<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ホーム</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/home.css')}}">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
   <div class="container-fluid">
        <div class="header bg-success">
            <header>
                <a href="#"><img src="./img/logaut.webp" alt=""></a>
                <ul class="menu">
                    <li class="menu__item">
                        <a href="" class="menu__link">社員</a>
                            <ol class="drop-menu">
                                <li class="drop-menu__item"><a href="" class="drop-menu__link">社員一覧</a></li>
                                <li class="drop-menu__item"><a href="" class="drop-menu__link">社員登録</a></li>
                                <li class="drop-menu__item"><a href="" class="drop-menu__link">社員編集</a></li>
                            </ol>
                    </li>
                    <li class="menu__item">
                        <a href="" class="menu__link">顧客</a>
                        <ol class="drop-menu">
                            <li class="drop-menu__item"><a href="" class="drop-menu__link">顧客一覧</a></li>
                            <li class="drop-menu__item"><a href="" class="drop-menu__link">顧客登録</a></li>
                            <li class="drop-menu__item"><a href="" class="drop-menu__link">顧客編集</a></li>
                        </ol>
                    </li>
                    <li class="menu__item">
                        <a href="" class="menu__link">キープボトル</a>
                        <ol class="drop-menu">
                            <li class="drop-menu__item"><a href="" class="drop-menu__link">顧客一覧</a></li>
                            <li class="drop-menu__item"><a href="" class="drop-menu__link">顧客登録</a></li>
                            <li class="drop-menu__item"><a href="" class="drop-menu__link">顧客編集</a></li>
                        </ol>
                    </li>
                    <li class="menu__item">
                        <a href="" class="menu__link">出退勤履歴</a>
                        <ol class="drop-menu">
                            <li class="drop-menu__item"><a href="" class="drop-menu__link">顧客一覧</a></li>
                            <li class="drop-menu__item"><a href="" class="drop-menu__link">顧客登録</a></li>
                            <li class="drop-menu__item"><a href="" class="drop-menu__link">顧客編集</a></li>
                        </ol>
                    </li>
                    <li class="menu__item">
                        <a href="" class="menu__link">伝票</a>
                        <ol class="drop-menu">
                            <li class="drop-menu__item"><a href="" class="drop-menu__link">顧客一覧</a></li>
                        </ol>
                    </li>
                </ul>
                <div class="hamburger-icon">
                    <div class="hamburger-area hamburger-area-aft">
                        <span class="hamburger-area1"></span>
                        <span class="hamburger-area2"></span>
                        <span class="hamburger-area3"></span>
                </div>
                </div>
        </header>
        </div>
        <div class="row main-header">
            <div class="  col-sm-9 event-header-text">
                <div class="header-text">イベントリスト</div>
            </div>
            <div class="col-sm-2 message-img"><img src="{{asset('images\homeImages\letterIcon.webp')}}" alt=""></div>
        </div>
        <div class="main">
            <div class="row event-header">
                <div class="col-sm-4 col-4 ">
                    <div class="card-body">
                        <div class="name mt-1">名前</div>
                    </div>
                </div>
                <div class="col-sm-4 col-4">
                    <div class="card-body">
                        <div class="date mt-1">スケジュール</div>
                    </div>
                </div>
                <div class="col-sm-4 col-4">
                    <div class="card-body">
                        <div class="event mt-1">イベント</div>
                    </div>
                </div>
            </div>
            <div class="row even-main">
                
                @foreach ($customerDatas as $customerData)
                   
                    <div class="col-sm-4 col-4 ">
                        <div class="card-body">
                            <div class="name mt-1"> {{$customerData->customer_name}}</div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4">
                        <div class="card-body">
                            <div class="mt-1 yellow">{{$customerData->birthday}}</div>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4">
                        <div class="card-body">
                            <div class="mt-1 yellow">誕生日</div>
                        </div>
                    </div>
                @endforeach
                
            </div>
        </div>
   </div>
</body>
</html>