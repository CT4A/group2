@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/itiran.css')}}">
@endsection
@section('title', '伝票一覧')

@section('content')
    <section class="bill-list">
        <div class="bill-list-area">
            <div class="bill-header">
            <h1>伝票一覧</h1>
            <button type="button" id="filter-btn">絞り込み</button>
            </div>
            <form action="#" class="search">
                <section class="filter">
                    <div class="filter-area">
                        <ul class="filter-header">
                            <li class="filter-close"><span></span></li>
                            <li><h2>フィルター</h2></li>
                            <li><span class="filter-clear">クリア</span></li>
                        </ul>
                        <div class="filter-items" id="time-filter">
                            <h2>日時</h2>
                            <button type="button" class="filter-element" data-filter ="1hour" >1時間前</button>
                            <button type="button" class="filter-element" data-filter="week">今週</button>
                            <button type="button" class="filter-element" data-filter="month">今月</button>
                            <button type="button" class="filter-element" data-filter="year">今年</button>
                            <button type="button" class="filter-element" data-filter="all">その他</button>
                            <input type="text">
                        </div>
                        <div class="filter-items" id="money-filter">
                            <h2>金額</h2>
                            <button type="button" class="filter-element" data-filter="money1">10,000~20,000</button>
                            <button type="button" class="filter-element" data-filter="money2">20,001~50,000</button>
                            <button type="button" class="filter-element" data-filter="money3">50001~100,000</button>
                        </div>
                        <!-- <div class="filter-items" id="people-filter">
                            <h2>人数</h2>
                            <button type="button" class="filter-element" data-filter="one-person">１人</button>
                            <button type="button" class="filter-element" data-filter="two-person">2人</button>
                            <button type="button" class="filter-element" data-filter="three-person">3人</button>
                            <button type="button" class="filter-element" data-filter="for-person">4人</button>
                            <button type="button" class="filter-element" data-filter="five-person">5人</button>
                            <button type="button" class="filter-element" data-filter="six">6人</button>
                            <button type="button" class="filter-element">6人以上</button>
                        </div> -->
                    </div>
                </section>
            </form>
            </div>
            <div class="bill-list-items">
                <ul>
                <!-- <li>
                    <span>名前</span>
                    <span>担当者</span>
                    <span>日付</span>
                    <span>金額</span>
                </li> -->
                    <li data-filter="1hour money1">
                        <span class="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span class="date">1hour</span>
                        <span class="money">money1</span>
                    </li>
                    <li data-filter="week money1">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>￥</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                                        <li data-filter="1hour money1">
                        <span class="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span class="date">1hour</span>
                        <span class="money">money1</span>
                    </li>
                    <li data-filter="week money1">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>￥</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="1hour money1">
                        <span class="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span class="date">1hour</span>
                        <span class="money">money1</span>
                    </li>
                    <li data-filter="week money1">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>￥</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="1hour money1">
                        <span class="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span class="date">1hour</span>
                        <span class="money">money1</span>
                    </li>
                    <li data-filter="week money1">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>￥</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="1hour money1">
                        <span class="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span class="date">1hour</span>
                        <span class="money">money1</span>
                    </li>
                    <li data-filter="week money1">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>￥</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="1hour money1">
                        <span class="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span class="date">1hour</span>
                        <span class="money">money1</span>
                    </li>
                    <li data-filter="week money1">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>￥</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="week money2">
                        <span>赤羽竜也</span>
                        <span>松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>

                </ul>
            </div>
    </section>

        @csrf
    </section>
@endsection
@section('scripts')
<script src="{{asset('js/itiran.js')}}"></script>
<script src ="{{asset('js/filter.js')}}"></script>
@endsection