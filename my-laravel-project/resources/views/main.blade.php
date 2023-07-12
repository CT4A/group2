<!DOCTYPE html>
<html lang="ja">

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{asset('css/header.css')}}">
    <link rel="stylesheet" href="bootstrap-4.0.0-dist\css\bootstrap-reboot.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>@yield('title')</title>
    @yield('styles')
</head>

<body>
    <header>
        <!-- <a href="logout"><img src="./img/logaut.webp" alt=""></a> -->
        <ul class="menu">
            <li class="menu_list ">

            </li>
            <li class="menu_list ">
                <span>社員</span>
                <ol>
                    <div class="menu_ele">
                        <li><a href="{{route('list-staff')}}">社員一覧</a></li>
                        <li><a href="{{route('indexEmpRegister')}}">社員登録</a></li>
                        <li><a href="{{route('indexEmpRegister')}}">パスワード変更</a></li>
                        <li><a href="{{route('indexEmpRegister')}}">給料</a></li>
                        <li><a href="{{route('indexEmpRegister')}}">シフト登録</a></li>
                    </div>
                </ol>
            </li>

            <li class="menu_list">
            <li class="menu_list ">
                <span>顧客</span>
                <ol>
                    <div class="menu_ele">
                        <li><a href="{{route('list-customer')}}">顧客一覧</a></li>
                        <li><a href="{{route('indexCusRegister')}}">顧客登録</a></li>
                    </div>
                </ol>
            </li>
            <li class="menu_list">
                <span>キープボトル</span>
                <ol>
                    <div class="menu_ele">
                        <li><a href="{{route('keepbottle-list')}}">キープボトル一覧</a></li>
                        <li><a href="{{route('indexKeepRegister')}}">キープボトル登録</a></li>
                    </div>
                </ol>
            </li>
            <li class="menu_list">
                <span>ボトル</span>
                <ol>
                    <div class="menu_ele">
                        <li><a href="#">ボトル一覧</a></li>
                        <li><a href="{{route('indexRegister')}}">ボトル登録</a></li>
                    </div>
                </ol>
            </li>
            <li class="menu_list">
                <span>出勤退勤履歴</span>
                <ol>
                    <div class="menu_ele">
                        <li><a href="{{route('history')}}">履歴編集画面</a></li>
                    </div>
                </ol>
            </li>
            <li class="menu_list">
                <span>伝票</span>
                <ol>
                    <div class="menu_ele">
                        <li><a href="{{route('list-bill')}}">伝票一覧</a></li>
                        <li><a href="{{route('indexBillRegister')}}">伝票登録</a></li>
                    </div>
                </ol>
            </li>
        </ul>
      <div class="hamburger-area">
      <div class="hamburger-icon">
      </div>
      <div class="hamburgerContents">
        <ul>
          <li>
            <div >
              <span>社員</span>
              <div class="accordion-content">
                  <a href="">社員一覧</a>
                  <a href="">社員登録</a>
                  <a href="">社員編集</a>
              </div>
        <div class="hamburger-area">
            <div class="hamburger-icon">
                <span></span>
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
                    <li>
                        <div class="accordion">
                            <span>キープボトル</span>
                            <div class="accordion-content">
                                <a href="">ボトル一覧</a>
                                <a href="">ボトル登録</a>
                                <a href="">ボトル編集</a>
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