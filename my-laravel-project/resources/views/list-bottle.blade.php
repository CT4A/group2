@extends('main')
@yield('title','')
@section('styles')
<link rel="stylesheet" href="{{asset('css/itiran.css')}}">
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
                <li><span data-id="{{$liquor->liquor_id}}">{{$liquor->liquor_type}}</span></li>
            @endforeach
        </ul>
    </div>
</div>
    </section>
    <section class="intell">
        <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
        <div class="intell-button">
            <div>
                
            </div>
        </div>
            <h1 id ="TxtNameHeader">ボトルの情報</h1>
            <ul>
                    <li itemprop="LiquorId">
                        <span>番号</span>
                        <span id ="liquor_id"></span>
                    </li>
                    <li itemprop="LiquorName">
                        <span>酒名</span>
                        <span id ="liquor_name"></span>
                    </li>
                    <li itemprop="kinds">
                        <span>種類</span>
                        <span id ="liquor_type"></span>
                    </li>
                    <li itemprop="LiquorNumber">
                        <span>数</span>
                        <span id ="liquor_number"></span>
                    </li>
                    <li>
                    <form action = "#">
                            <button id="editBtn">    
                                <img src="img\edit.png" alt="">
                                <span>編集</span>
                            </button>
                        </form>
                    </li>
            </ul>
        </div>
        <div class="intell-close">
            <button>
                <img src="../img/close.png" alt="">
                <span>閉じる</span>
            </button>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/bottle.js"></script>
@endsection