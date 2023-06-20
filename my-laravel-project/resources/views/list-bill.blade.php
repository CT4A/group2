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
            <input type="text" placeholder="名前を入力してください" id = "billSearch">
            <button type="button" id="filter-btn">絞り込み</button>
            <div class="bill-list-items-header">
                    <span>名前</span>
                    <span>担当者</span>
                    <span>日付</span>
                    <span>金額</span>
                    </div>
            </div>
            <form action="#" class="search">
                <section class="filter">
                    <div class="filter-area">
                        <ul class="filter-header">
                            <li class="filter-close"><span></span></li>
                            <!-- <li><h2>フィルター</h2></li> -->
                            <li><span class="filter-clear">クリア</span></li>
                        </ul>
                        <div class="filter-items" id="time-filter">
                            <h2>日時</h2>
                            <button type="button" class="filter-element" data-filter ="1hour" >1時間前</button>
                            <button type="button" class="filter-element" data-filter="week">今週</button>
                            <button type="button" class="filter-element" data-filter="month">今月</button>
                            <button type="button" class="filter-element" data-filter="year">今年</button>
                            <button type="button" class="filter-element" data-filter="OneYearAgo">1年より前</button>
                        </div>
                        <div class="filter-items" id="money-filter">
                            <h2>金額</h2>
                            <button type="button" class="filter-element" data-filter="money1">15,000~50,000</button>
                            <button type="button" class="filter-element" data-filter="money2">50,001~100,000</button>
                            <button type="button" class="filter-element" data-filter="money3">100,001~150,000</button>
                            <button type="button" class="filter-element" data-filter="money4">150,000以上</button>
                        </div>
                    </div>
                </section>
            </form>
            </div>
            <div class="bill-list-items">
                <ul>
                    <li data-filter="1hour money1">
                        <span class="customer_name">グエンnnnnnnnnnnnnnnn</span>
                        <span class="staff_name">片山</span>
                        <span class="date">1hour</span>
                        <span class="money">money1</span>
                    </li>
                    <li data-filter="week money1">
                        <span class="customer_name">グエン</span>
                        <span class="staff_name">松岡chin</span>
                        <span>week</span>
                        <span>￥</span>
                    </li>
                    <li data-filter="week money2">
                        <span class ="customer_name">野々川</span>
                        <span class="staff_name">松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="week money2">
                        <span class ="customer_name">杉山</span>
                        <span class="staff_name">松岡chin</span>
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
                        <span class ="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span>week</span>
                        <span>￥</span>
                    </li>
                    <li data-filter="week money2">
                        <span class ="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="week money2">
                        <span class ="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
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
                        <span class ="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span>week</span>
                        <span>￥</span>
                    </li>
                    <li data-filter="week money2">
                        <span class ="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="week money2">
                        <span class ="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span>week</span>
                        <span>money2</span>
                    </li>
                    <li data-filter="1hour money1">
                        <span class="customer_name">赤羽竜也</span>
                        <span class="staff_name">松岡chin</span>
                        <span class="date">1hour</span>
                        <span class="money">money1</span>
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