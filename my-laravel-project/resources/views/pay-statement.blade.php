@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/pay-statement.css')}}">
@endsection
@section('title', '社員一覧')

@section('content')
<main>
    <section class="emp-list">
        <div class="emp-list-area">
            <h1>給料明細</h1>
            <form action="#">
                <button type="submit">
                    <img src="./img/oqCh3X9ndfQ__xOuxd5Oww==.png" alt="">
                </button>
                <input type="text" placeholder="社員の名前を入力してください">
            </form>
            <div class="emp-name">
                <ul>
                    <li>
                        <span id="1">名前</span>
                        <span id="1">給料</span>
                    </li>
                </ul>
            </div>
        </div>
    </section>
    <section class="intell">
        <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
            <h1 id="TxtNameHeader">さんの給料明細</h1>
            <ul>
                <li itemprop="identifier">
                    <span>番号</span>
                    <span id="staff_id"></span>
                </li>
                <li itemprop="name">
                    <span>名前</span>
                    <span id="staff_name"></span>
                </li>
                <li itemprop="telephone">
                    <span>電話番号</span>
                    <span id="tel"></span>
                </li>
                <li itemprop="address">
                    <span>住所</span>
                    <span id="residence"></span>
                </li>
                <li itemprop="birthDate">
                    <span>誕生日</span>
                    <span id="birthday"></span>
                </li>
                <li itemprop="description">
                    <span>備考</span>
                    <span id="remarks"></span>
                </li>
                <li itemprop="description">
                    <span>備考</span>
                    <span id="remarks"></span>
                </li>
            </ul>
        </div>
        @csrf
    </section>
</main>
@endsection
@section('scripts')
<script src="{{asset('js/itiran.js')}}"></script>
@endsection