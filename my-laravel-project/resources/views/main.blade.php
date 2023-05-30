<!DOCTYPE html>
<html lang="ja">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="社員一覧">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- <link rel="stylesheet" href="css/header.css">
    <link rel="stylesheet" href="./css/itiran.css"> --}}

    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="{{asset('css/itiran.css')}}">
    <title>@yield('title')</title>
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
        <section class="emp-list">
            <div class="emp-list-area">
            <h1>社員一覧</h1>
            <form action="#">
                    <button type="submit">
                        <img src="./img/oqCh3X9ndfQ__xOuxd5Oww==.png" alt="">
                    </button>
                    <input type="text" placeholder="顧客の名前を入力してください">
            </form>
            <div class="emp-name">
            <ul>
                @foreach ($staffs as $staff)
                    <li><span id={{$staff->staff_id}}>{{$staff->staff_name}}</span></li>
                @endforeach
            </ul>
        </div>
    </div>
        </section>
        <section class="intell">
            <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
            <h1 id="TxtNameHeader">〇〇の情報</h1>
                <ul>
                        <li itemprop="identifier">
                            <span>番号</span>
                            <span id="staff_id">01</span>
                        </li>
                        <li itemprop="name">
                            <span>名前</span>
                            <span id="staff_name">名古屋タロウ</span>
                        </li>
                        <li itemprop="telephone">
                            <span>電話番号</span>
                            <span id="tel">090-6332-2128</span>
                        </li>
                        <li itemprop="address">
                            <span>住所</span>
                            <span id="residence">あああああああああ</span>
                        </li>
                        <li itemprop="birthDate">
                            <span>誕生日</span>
                            <span id="birthday">1990-01-01</span>
                        </li>
                        <li itemprop="description">
                            <span>備考</span>
                            <span id="remarks">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</span>
                        </li>
                </ul>
            </div>
            @csrf
        </section>
    </main>
    {{-- {{ csrf_field() }} --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    {{-- <script src="js/index.js"></script>
    <script src="js/itiran.js"></script> --}}
    <script src="{{asset('js/index.js')}}"></script>
    <script src="{{asset('js/itiran.js')}}"></script>
</body>
</html>