@php
use Carbon\Carbon;
$today = Carbon::now()->format('Y/m/d');
@endphp
@extends('main')
@yield('title','予約')
@section('styles')
    
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
<div class="message text-center">
    <div class="alert alert-primary" role="alert">
        <strong>{{session('message')}}</strong>
    </div>
</div>
<main>
    <section class="register">
        <div class="register-area">
            <h1>予約</h1>
            <ul>
                <form action="/resrve-register" method="POST">
                    @csrf
                    <!-- <li>
                        <span>顧客名</span>
                        <input type="text" name="customer_name">
                        @if ($errors->has('customer_name'))
                            <span class="error">{{ $errors->first('customer_name') }}</span>
                        @endif
                    </li> -->
                    @csrf
                    <li class="kinds">
                        <span>顧客名</span>
                        <div class="kinds-selecter">
                        <span>選択してください</span>
                        <ul class="kind-list" id ="">
                            @foreach ($liquors as $liquor)
                            <li>{{$liquor->liquor_type}}</li>
                            @endforeach
                            <li>その他</li>
                        </ul> 
                        </div>
                        <input type="text" id ="liquor_type" value="{{ old('liquor_type') }}" class="kinds-inp"  name="customer_name" placeholder="顧客名を入力してください">
                        @if ($errors->has('liquor_type'))
                            <span class="error">{{ $errors->first('liquor_type') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>人数</span>
                        <input type="text" name="reserve_people">
                        @if ($errors->has('reserve_people'))
                            <span class="error">{{ $errors->first('reserve_people') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>テーブル番号</span>
                        <input type="text" name="table_number">
                        @if ($errors->has('table_number'))
                            <span class="error">{{ $errors->first('table_number') }}</span>
                        @endif
                    </li>
                    <!-- <li>
                        <span>担当者</span>
                        <input type="text" id="staff_name" name="staff_name">
                        @if ($errors->has('staff_name'))
                            <span class="error">{{ $errors->first('staff_name') }}</span>
                        @endif
                        <input type="text" id="staff_id" name="staff_id" hidden>
                    </li> -->
                    @csrf
                    <li class="kinds">
                        <span>担当者</span>
                        <div class="kinds-selecter">
                        <span>選択してください</span>
                        <ul class="kind-list" id ="">
                            @foreach ($liquors as $liquor)
                            <li>{{$liquor->liquor_type}}</li>
                            @endforeach
                            <li>その他</li>
                        </ul> 
                        </div>
                        <input type="text" id ="liquor_type" value="{{ old('liquor_type') }}" class="kinds-inp"  name="staff_id" placeholder="顧客名を入力してください">
                        @if ($errors->has('liquor_type'))
                            <span class="error">{{ $errors->first('liquor_type') }}</span>
                        @endif
                    </li>
                    
                    <li>
                        <span>日付</span>
                        <input type="text" id="reserve_date" name="reserve_date" value="{{$today}}">
                        @if ($errors->has('reserve_date'))
                            <span class="error">{{ $errors->first('reserve_date') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>予約時間</span>
                        <input type="text" name="reserve_time">
                        @if ($errors->has('reserve_time'))
                            <span class="error">{{ $errors->first('reserve_time') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>制限</span>
                        <input type="text" name="upper_limit" placeholder="￥">
                        @if ($errors->has('upper_limit'))
                            <span class="error">{{ $errors->first('customupper_limiter_id') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>備考</span>
                        <textarea name="remarks" ></textarea>
                    </li>
                <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
</main>
@endsection
@section('scripts')
<script src="js/register.js"></script>
<script src="js/index.js"></script>
@endsection