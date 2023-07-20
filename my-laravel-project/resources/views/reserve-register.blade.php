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
    <section class="register">
        <div class="register-area">
            <h1>予約</h1>
            <ul class="register-areaUL">
                <form action="/reserve-register" method="POST">
                    @csrf     
                    <li>
                        <span>顧客名</span>
                        <input type="text" name="customer_name">
                    </li> 
                    @if ($errors->has('customer_name'))
                            <span class="error">{{ $errors->first('customer_name') }}</span>
                        @endif
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
                    </li>
                    @if ($errors->has('table_number'))
                            <span class="error">{{ $errors->first('table_number') }}</span>
                        @endif                             
                    <li class="kinds">
                        <span>担当者</span>
                        <div class="kinds-selecter">
                        <span>選択してください</span>
                        <ul class="kind-list" id ="staffList">
                            @foreach ($staffs as $staff)
                                <li data="{{$staff->staff_id}}">{{$staff->staff_name}}</li>
                            @endforeach

                        </ul> 
                        </div>
                        <input type="text" id="staff_name" class="kinds-inp" name="staff_name"
                           value="{{ old('staff_name') }}">
                        <input type="text" id="staff_id" class="kinds-inp-hidden" name="staff_id"
                            value="{{ old('staff_id') }}" hidden>
                    </li>
                    <li>
                        <span>日付</span>
                        <input type="date" id="reserve_date" name="reserve_date" value="{{$today}}">
                    </li>
                    @if ($errors->has('reserve_date'))
                            <span class="error">{{ $errors->first('reserve_date') }}</span>
                        @endif
                    <li>
                        <span>予約時間</span>
                        <input type="text" name="reserve_time">
                    </li>
                    @if ($errors->has('reserve_time'))
                            <span class="error">{{ $errors->first('reserve_time') }}</span>
                        @endif
                    <li>
                        <span>制限</span>
                        <input type="text" name="upper_limit" placeholder="￥">
                    </li>
                    @if ($errors->has('upper_limit'))
                            <span class="error">{{ $errors->first('customupper_limiter_id') }}</span>
                        @endif
                    <li>
                        <span>備考</span>
                        <textarea name="remarks" ></textarea>
                    </li>
                    <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/register.js"></script>
<script src="js/index.js"></script>
@endsection