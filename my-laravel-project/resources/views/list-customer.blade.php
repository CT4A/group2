@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/itiran.css')}}">
@endsection
@section('title', '顧客一覧')
@section('content')
    <section class="emp-list">
        <div class="emp-list-area">
        <h1>顧客一覧</h1>
        <form class="search">
                <button type="submit">
                    <img src="./img/oqCh3X9ndfQ__xOuxd5Oww==.png" alt="">
                </button>
                <input id="search" type="text" placeholder="顧客の名前を入力してください">
        </form>
        <div class="emp-name">
        <ul>
            @foreach ($customers as $customer)
                <li><span id="{{$customer->customer_id}}">{{$customer->customer_name}}</span></li>
            @endforeach
        </ul>
    </div>
</div>
    </section>
    <section class="intell">
        <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
        <h1 id="TxtNameHeader">情報</h1>
            <ul>
                <li>
                    <span>顧客名</span>
                    <span id="customer_name" data-id=""></span>
                </li>
                <li>
                    <span>会社名</span>
                    <span id="company_name"></span>
                </li>
                <li>
                    <span>誕生日</span>
                    <span id="birthday"></span>
                </li>
                <li>
                    <span>担当社員</span>
                    <span id="staff_name"></span>
                </li>
                <li>
                    <span>今月の総合金額</span>
                    <span id="this_month_money" class="money"></span>
                </li>
                <li>
                    <span>先月の総合金額</span>
                    <span id="that_month_money" class="money"></span>
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
        @csrf
        <div class="intell-close">
            <button>
                <img src="../img/close.png" alt="">
                <span>閉じる</span>
            </button>
        </div>
    </section>
@endsection
@section('scripts')
<script src="{{asset('js/list-customer.js')}}"></script>
@endsection