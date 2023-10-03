@extends('main')
@yield('title','')
@section('title','キープボトル一覧')
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
                <li><span data-id="{{$liquor->liquor_id}}">{{$liquor->liquor_name}}</span></li>
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
            <h1 id ="TxtNameHeader">キープボトルの情報</h1>
            <ul>
                    <li itemprop="identifier">
                        <span>番号</span>
                        <span id="liquor_id"></span>
                    </li>
                    <li itemprop="name">
                        <span>名前</span>
                        <span id ="name">1</span>
                    </li>
                    <li itemprop="Liquorname">
                        <span>酒名</span>
                        <span id ="liquor_name">1</span>
                    </li>
                    <li itemprop="kinds">
                        <span>種類</span>
                        <span id="liquor_type">1</span>
                    </li>
                    <li itemprop="date">
                        <span>日付</span>
                        <span id ="data">1</span>
                    </li>
                    <li itemprop="description">
                        <span>備考</span>
                        <span id = "remarks">1</span>
                    </li>
                    <li>
                        <form>
                            <img src="img\edit.png" alt="">
                            <button id="editBtn">編集</button>
                        </form>
                    </li>
            </ul>
        </div>
    </section>
@endsection
@section('scripts')
{{-- <script src="js/itiran.js"></script> --}}
<script src="js/keepbottle.js"></script>
@endsection