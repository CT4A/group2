@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/itiran.css')}}">
@endsection
@section('title', '伝票一覧')

@section('content')
    <section class="emp-list">
        <div class="emp-list-area">
            <h1>伝票一覧</h1>
            <form action="#">
                <section class="filter">
                    <button type="button" class="filter-btn">絞り込み</button>
                    <div class="filter-area">
                        <ul class="filter-header">
                            <li class="filter-close"><span></span></li>
                            <li><h2>フィルター</h2></li>
                            <li><span class="filter-clear">クリア</span></li>
                        </ul>
                    </div>
                </section>
            </form>
            <div class="emp-name">
                <ul>
                </ul>
            </div>
        </div>
    </section>
    <section class="intell">
        <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
            <h1 id="TxtNameHeader">情報</h1>
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
            </ul>
        </div>
        @csrf
    </section>
@endsection
@section('scripts')
<script src="{{asset('js/itiran.js')}}"></script>
@endsection