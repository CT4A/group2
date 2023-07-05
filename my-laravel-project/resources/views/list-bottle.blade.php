@extends('main')
@yield('title','')
@section('styles')
<link rel="stylesheet" href="./css/itiran.css">
@endsection
@section('content')
    <section class="emp-list">
        <div class="emp-list-area">
        <h1>ボトル一覧</h1>
        <form action="#" class="search">
                <button type="submit" >
                    <img src="./img/oqCh3X9ndfQ__xOuxd5Oww==.png" alt="">
                </button>
                <input id ="search" type="text" placeholder="ボトルの名前を入力してください">
        </form>
        <div class="emp-name">
        <ul>
            <li><span id="">あかばちゃんかわいい</span></li>        
            <li><span id="">あかばちゃんかわいい</span></li>        
            <li><span id="">あかばちゃんかわいい</span></li>        
            <li><span id="">あかばちゃんかわいい</span></li>        
            <li><span id="">あかばちゃんかわいい</span></li>        
            <li><span id="">あかばちゃんかわいい</span></li>        
            <li><span id="">あかばちゃんかわいい</span></li>        
        </ul>
    </div>
</div>
    </section>
    <section class="intell">
        <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
        <div class="intell-button">
            <div></div>
        </div>
            <h1>〇〇の情報</h1>
            <ul>
                    <li itemprop="identifier">
                        <span>番号</span>
                        <span id = "liquor_id">01</span>
                    </li>
                    <li itemprop="name">
                        <span>種類</span>
                        <span  id ="liquor_type">ウイスキー</span>
                    </li>
                    <li itemprop="Liquorname">
                        <span>酒名</span>
                        <span id ="liquor_name">山崎55年</span>
                    </li>
                    <li itemprop="kinds">
                        <span>合計本数</span>
                        <span id="liquor_number">10本</span>
                    </li>
            </ul>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/itiran.js"></script>
<script src="js/keepbottle.js"></script>
@endsection