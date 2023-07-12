
@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/itiran.css')}}">
@endsection
@section('title', '給料明細')

@section('content')
<main>
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
                        <div id="c1">名前</div>
                        <div id="c2">給料</div>
                    </div>
                    @foreach ($staffs as $staff)
                        <li>
                            <span data-id="{{$staff->staff_id}}">{{$staff->staff_name}}</span>
                            <span data-id="{{$staff->staff_id}}">{{$staff->total_salary}}円</span>
                        </li>
                    @endforeach
            </ul>
        </div>
    </div>
</section>
<section class="intell">
    <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
        <h1 id="TxtNameHeader">さんの給料明細</h1>
        <ul>
            <li itemprop="identifier">
                <span >基本給</span>
                <span id="salary">1000円</span>
                <span ></span>
            </li>
            <li itemprop="name">
                <span >出勤日数</span>
                <span id="total_working_days">24日</span>
                <span ></span>
            </li>
            <li itemprop="telephone">
                <span >実働時間</span>
                <span id="total_time">170時間</span>
                <span ></span>
            </li>
            <li itemprop="address">
                <span >同伴</span>
                <span id="total_money_people">5,0000円</span>
                <span ></span>
            </li>
            <li itemprop="birthDate">
                <span >控除金額</span>
                <span id="deduction">6000円</span>
                <span ></span>
            </li>
            <li itemprop="description">
                <span >基本給総合</span>
                <span id="basic_salary">19,0000円</span>
                <span ></span>
            </li>
            <li itemprop="description">
                <span >総支給額</span>
                <span id="total_salary">23,0000円</span>
                <span ></span>
            </li>

        </ul>
    </div>
    @csrf
</section>
@endsection
@section('scripts')
<script src="{{asset('js/payStatement.js')}}"></script>
@endsection