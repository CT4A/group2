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
            <div id = "filter">
            <button type="button" id="filter-btn">
                <img src="../img/filter.png" alt="">    
            </button>
            <input type="text" placeholder="名前を入力してください" id = "billSearch">
            </div>
            <div class="bill-list-items-header">
                    <span>名前</span>
                    <span>担当者</span>
                    <!-- <span>日付</span> -->
                    <span>金額</span>
                    </div>
            </div>
            <form action="#" class="search">
                <section class="filter">
                    <div class="filter-area">
                        <ul class="filter-header">
                            <li class="filter-close"><span></span></li>
                            <li><span class="filter-clear">クリア</span></li>
                        </ul>
                        <div class="filter-item-filed">  
                        <div class="filter-items" id="time-filter">
                            <h2>日時</h2>
                            <button type="button" class="filter-element" data-filter="week">今週</button>
                            <button type="button" class="filter-element" data-filter="month">今月</button>
                            <button type="button" class="filter-element" data-filter="year">今年</button>
                            <button type="button" class="filter-element" data-filter="OneYearAgo">1年より前</button>
                        </div>
                        <div class="filter-items" id="money-filter">
                            <h2>金額</h2>
                            <button type="button" class="filter-element" data-filter="money1">~50,000</button>
                            <button type="button" class="filter-element" data-filter="money2">50,001~100,000</button>
                            <button type="button" class="filter-element" data-filter="money3">100,001~150,000</button>
                            <button type="button" class="filter-element" data-filter="money4">150,000~</button>
                        </div>
                        </div>
                    </div>
                </section>
            </form>
            </div>
            <div class="bill-list-items">
                @php
                    $previousDate = null;
                @endphp

                @foreach ($slips as $slip)
                @php
                //日付のフィルターの処理    
                        //比較日付定義
                            $currentDate = new DateTime(); 
                            $oneYearAgo = clone $currentDate;
                            $oneYearAgo->modify('-1 year');
                            $oneMonthAgo = clone $currentDate;
                            $oneMonthAgo->modify('-1 month');
                            $oneWeekAgo = clone $currentDate;
                            $oneWeekAgo->modify('-1 week');
                            $slip_date = $slip->ap_day;
                            //比較日付定義　ここまで
                            $slip_date = new Datetime($slip->ap_day);
                            if($slip_date >= $oneWeekAgo){
                                $timeFilter = "week";
                            }elseif ($slip_date >= $oneMonthAgo) {
                                $timeFilter = "month";
                            }elseif ($slip_date >= $oneYearAgo) {
                                $timeFilter = "year";
                            }else {
                                $timeFilter = "OneYearAgo";
                            }
                            
                    //金額のフィルターの処理
                            $total = $slip->total;
                            if($total >= 150000){
                                $totalFilter = "money4";
                            }elseif ($total >= 100001 ) {
                                $totalFilter = "money3";
                            }elseif ($total >= 50001) {
                                $totalFilter = "money2";
                            }else{
                                $totalFilter = "money1";
                            }
    @endphp

    @if ($slip->ap_day !== $previousDate)
        @if (isset($currentUl))
            </ul>
        @endif

        <ul>
            <span class="timer">{{ date('Y-m-d', strtotime($slip->ap_day)) }}</span>
            @php
                $currentUl = true;
            @endphp
    @endif

    <li data-filter="{{ $timeFilter . ' ' . $totalFilter }}">
        <span class="customer_name">{{ $slip->customer_name }}</span>
        <span class="staff_name">{{ $slip->staff_name }}</span>
        <span class="money">{{ $slip->total }}</span>
    </li>

    @php
        $previousDate = $slip->ap_day;
    @endphp
@endforeach

@if (isset($currentUl))
    </ul>
@endif
            </div>
    </section>

        @csrf
    </section>
@endsection
@section('scripts')
<script src="{{asset('js/itiran.js')}}"></script>
<script src ="{{asset('js/filter.js')}}"></script>
@endsection