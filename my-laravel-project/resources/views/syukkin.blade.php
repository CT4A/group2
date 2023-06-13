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
            <div class="flter-selector">
                10人以下
                <div class="filter-button filter-button-aft">
                <span>1人</span>
                <span>2人</span>
                <span>3人</span>
                <span>4人</span>
                <span>5人</span>
                <span>6人</span>
                <span>7人</span>
                <span>8人</span>
                <span>9人</span>
                <span>10人</span>
                </div>
            </div>
            <div class="flter-selector">
                20人以下
                <div class="filter-button">
                <span>11人</span>
                <span>12人</span>
                <span>13人</span>
                <span>14人</span>
                <span>15人</span>
                <span>16人</span>
                <span>17人</span>
                <span>18人</span>
                <span>19人</span>
                <span>20人</span>
</div>
            </div>
            <div class="flter-selector">
                30人以下
                <div class="filter-button">
                <span>21人</span>
                <span>22人</span>
                <span>23人</span>
                <span>24人</span>
                <span>25人</span>
                <span>26人</span>
                <span>27人</span>
                <span>28人</span>
                <span>29人</span>
                <span>30人</span>
</div>
            </div>
            <div class="flter-selector">
                40人以下
                <div class="filter-button">
                <span>31人</span>
                <span>32人</span>
                <span>33人</span>
                <span>34人</span>
                <span>35人</span>
                <span>36人</span>
                <span>37人</span>
                <span>38人</span>
                <span>39人</span>
                <span>40人</span>
</div>
            </div>
            <div class="flter-selector">
                50人以下
                <div class="filter-button">
                <span>41人</span>
                <span>42人</span>
                <span>43人</span>
                <span>44人</span>
                <span>45人</span>
                <span>46人</span>
                <span>47人</span>
                <span>48人</span>
                <span>49人</span>
                <span>50人</span>
</div>
            </div>
        </section>
     </div>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
     {{-- <script src= "./js/time.js"></script> --}}
     <script src= "{{asset('js/time.js')}}"></script>
    </body>
</main>
</html>
