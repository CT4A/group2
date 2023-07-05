@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/itiran.css')}}">
@endsection
@section('title', '社員一覧')

@section('content')
<section class="emp-list">
    <div class="emp-list-area">
        <h1>給料明細</h1>
        <form action="#" class="search">
            <button type="submit">
                <img src="./img/oqCh3X9ndfQ__xOuxd5Oww==.png" alt="">
            </button>
            <input type="text" placeholder="社員の名前を入力してください">
        </form>
        <div class="emp-name">
            <ul>
                <div class="container">
                    <!-- <p id="p1" class="p1">名前</p>
                    <p id="p2" class="p2">給料</p> -->
                    <div id="c1">名前</div>
                    <div id="c2">給料</div>
                </div>

                <li>
                    <div id="c3">NGUYEN</div>
                    <div id="c4">19,0000円</div>
                </li>
                <li>
                    <div id="c3">勘解由小路</div>
                    <div id="c4">19,0000円</div>
                </li>
                <li>
                    <div id="c3">松岡チン</div>
                    <div id="c4">19,0000円</div>
                </li>
                <li>
                    <div id="c3">NGUYEN</div>
                    <div id="c4">19,0000円</div>
                </li>
                <li>
                    <div id="c3">NGUYEN</div>
                    <div id="c4">19,0000円</div>
                </li>
                <li>
                    <div id="c3">NGUYEN</div>
                    <div id="c4">19,0000円</div>
                </li>
                <li>
                    <div id="c3">NGUYEN</div>
                    <div id="c4">19,0000円</div>
                </li>
                <li>
                    <div id="c3">NGUYEN</div>
                    <div id="c4">19,0000円</div>
                </li>
                <!-- <li>
                    <div id="c1">勘解由小路</div>
                    <div id="c2">19,0000円</div>
                </li> -->

            </ul>
        </div>
    </div>
</section>
<section class="intell">
    <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
        <h1 id="TxtNameHeader">さんの給料明細</h1>
        <ul>
            <li itemprop="identifier">
                <span id="left">基本給</span>
                <span id="right">1000円</span>
                <span id="staff_id"></span>
            </li>
            <li itemprop="name">
                <span id="left">出勤日数</span>
                <span id="right">24日</span>
                <span id="staff_name"></span>
            </li>
            <li itemprop="telephone">
                <span id="left">実働時間</span>
                <span id="right">170時間</span>
                <span id="tel"></span>
            </li>
            <li itemprop="address">
                <span id="left">同伴</span>
                <span id="right">5,0000円</span>
                <span id="residence"></span>
            </li>
            <li itemprop="address">
                <span id="left">回数</span>
                <span id="right">2回</span>
                <span id="residence"></span>
            </li>
            <li itemprop="birthDate">
                <span id="left">控除金額</span>
                <span id="right">6000円</span>
                <span id="birthday"></span>
            </li>
            <li itemprop="description">
                <span id="left">基本給総合</span>
                <span id="right">19,0000円</span>
                <span id="remarks"></span>
            </li>
            <li itemprop="description">
                <span id="left">総支給額</span>
                <span id="right">23,0000円</span>
                <span id="remarks"></span>
            </li>

        </ul>
    </div>
    @csrf
</section>
@endsection
@section('scripts')
<script src="{{asset('js/itiran.js')}}"></script>
@endsection