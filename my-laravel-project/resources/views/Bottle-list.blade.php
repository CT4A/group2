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
            @foreach ($liquors as $liquor)
                <li><span id="{{$liquor->liquor_id}}">{{$liquor->liquor_name}}</span></li>
            @endforeach
        </ul>
    </div>
</div>
    </section>
    <section class="intell">
        <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
        <div class="intell-close">
            <button>
                <img src="../img/close.png" alt="">
                <span>閉じる</span>
            </button>
        </div>
            <h1>〇〇の情報</h1>
            <ul>
                    <li itemprop="identifier">
                        <span>番号</span>
                        <span>01</span>
                    </li>
                    <li itemprop="name">
                        <span>名前</span>
                        <span>名古屋タロウ</span>
                    </li>
                    <li itemprop="Liquorname">
                        <span>酒名</span>
                        <span>山崎55年</span>
                    </li>
                    <li itemprop="kinds">
                        <span>種類</span>
                        <span>ウイスキー</span>
                    </li>
                    <li itemprop="date">
                        <span>日付</span>
                        <span>2023年5月8日</span>
                    </li>
                    <li itemprop="description">
                        <span>備考</span>
                        <span>テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</span>
                    </li>
            </ul>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/bottle.js"></script>
@endsection