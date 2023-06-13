<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>勤退登録画面</title>
    <link rel="stylesheet" href="{{asset('css/syukkin.css')}}">
</head>
<main>
<body>
     <div class="containt">
        <section class="leawork">
            <div class="leaworkArea">
            <div class="currtimefiled">
                <span class="currDate">2022年00月00日(月)</span>
                <span class="currTime">00:00</span>
            </div>
            <div class="leawork">
                <form class="leaworkFiled">
                    <button type="submit" class="test">
                        <img src="./img/t.png" alt="">
                        <span>出勤</span> 
                    </button>
                    <button type="submit">
                        <img src="./img/63z7Bolx8cP5pkcxNhY2GA==.svg" alt="">
                        <span>退勤</span> 
                    </button>
                </form> 
            </div>
       </div>
        </section>
        <section class="fileter">
        <div class="leavetime">
            <ul class="leavetimeArea">
                <li>
                    <span>〇〇さん</span>
                    <span>〇〇時間に出勤</span>
                </li>
                <li>
                    <span>〇〇さん</span>
                    <span>〇〇時間に出勤</span>
                </li>
                <li>
                    <span>〇〇さん</span>
                    <span>〇〇時間に出勤</span>
                </li>
                <li>
                    <span>〇〇さん</span>
                    <span>〇〇時間に出勤</span>
                </li>
            </ul>
        </div>
            <div class="customer-number">
                <h2>同伴者数</h2>
                <ul class="customer-number-list">
                <li id="customer-select-number"><span>0人</span></li>
                @for ($i = 1; $i <= 50; $i++)
                <li><span>{{$i}}人</span></li>
                @endfor
                </ul>
            </div>
            <div class="emp-number">
                <h2>担当人数</h2>
            <ul class="emp-number-list">
                <li id ="emp-select-number"><span>0人</span></li>
                @for ($i = 1; $i <= 50; $i++)
                <li><span>{{$i}}人</span></li>
                @endfor
                </ul>
            </div>
        </section>
     </div>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     {{-- <script src= "./js/time.js"></script> --}}
     <script src= "{{asset('js/time.js')}}"></script>
    </body>
</main>
</html> 
