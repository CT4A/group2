<!DOCTYPE html>
<html lang="ja">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="社員一覧">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('title')</title>
    @yield('styles')

</head>
<body>
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
                    <li class="drop-menu__item">
                        <a href="" class="drop-menu__link">顧客一覧</a>
                    </li>
                </ol>
            </li>
        </ul>
        <div class="hamburger-area">
            <div class="hamburger-icon">
                <span class="hamburger-area1"></span>
                <span class="hamburger-area2"></span>
                <span class="hamburger-area3"></span>
            </div>
            <div class="hamburgerContents">
                <ul>
                <li>
                    <div class="accordion">
                        <span>社員</span>
                    <div class="accordion-content">
                        <a href="">社員一覧</a>
                        <a href="">社員登録</a>
                        <a href="">社員編集</a>
                    </div>
                </div>
                </li>
                <li>
                    <div class="accordion">
                        <span>顧客</span>
                    <div class="accordion-content">
                        <a href="">顧客一覧</a>
                        <a href="">顧客登録</a>
                        <a href="">顧客編集</a>
                    </div>
                </div>
                </li>
                <li><div class="accordion">
                        <span>キープボトル</span>
                        <div class="accordion-content">
                            <a href="">test2</a>
                            <a href="">test3</a>
                        </div>
                    </div>
                </li>
                <li><a href="">出勤退勤履歴</a></li>
                <li><a href="">伝票</a></li>
                        </ul>
            </div>
        </div>
    </header>
    <main>
        @yield('content')
    </main>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{asset('js/index.js')}}"></script>
    @yield('scripts')
</body>
</html>