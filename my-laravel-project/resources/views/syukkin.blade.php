<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤退登録画面</title>
    <link rel="stylesheet" href="{{asset('css/syukkin.css')}}">
</head>

<body>
    <div class="containt">
        <section class="leawork">
            <div class="leaworkArea">
                <div class="currtimefiled">
                    <span class="currDate">2022年00月00日(月)</span>
                    <span class="currTime">00:00</span>
                </div>
                <div class="leawork">
                    <button id="start">
                        <img src="./img/t.png" alt="">
                        <span>出勤</span>
                    </button>
                    <button id="end">
                        <img src="./img/63z7Bolx8cP5pkcxNhY2GA==.svg" alt="">
                        <span>退勤</span>
                    </button>
                </div>
            </div>
        </section>
        <section class="fileter">
            <div class="leavetime">
                <ul class="leavetimeArea">
                    @foreach ($syukkins as $syukkin)
                    <li>
                        <span>{{$syukkin->staff_name}}さん</span>
                        <span>{{$syukkin->time}}に{{$syukkin->type}}</span>
                    </li>
                    @endforeach
                </ul>
            </div>
            <div class="customer-number">
                <h2>同伴者数</h2>
                <ul class="customer-number-list" id='customer-list'>
                    <li id="customer-select-number"><span>0</span></li>
                    @for ($i = 1; $i <= 50; $i++) <li><span>{{$i}}</span></li>
                        @endfor
                </ul>
            </div>
            <div class="emp-number">
                <h2>担当人数</h2>
                <ul class="emp-number-list" id='employee-list'>
                    <li id="emp-select-number"><span>0</span></li>
                    @for ($i = 1; $i <= 50; $i++) <li><span>{{$i}}</span></li>
                    @endfor
                </ul>
            </div>
        </section>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</body>

</html>
<script>

</script>
<script src="{{asset('js/time.js')}}"></script>