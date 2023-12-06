@php
use Carbon\Carbon;
$today = Carbon::now()->format('Y/m/d');
@endphp
@extends('main')
@section('title','顧客登録')
@section('styles')
<link rel="stylesheet" href="./css/information.css">
<link rel="stylesheet" href="./css/register.css"> 
<link rel="stylesheet" href="./css/bill-register.js">
@endsection
@section('content')
    <section class="register">
        <div class="register-area">
            <h1>伝票登録</h1>
            <form action="/bill-register" method="POST">
            <ul class="register-areaUL">
                    @csrf
                    <li class="kinds">
                        <span>社員名</span>
                        <div class="kinds-selecter">
                            <span>選択してください</span>
                            <ul class="kind-list" id="staffList">
                                @foreach ($staffs as $staff)
                                    <li data='{{$staff->staff_id}}'>{{$staff->staff_name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <input type="text" id="staff_name" class="kinds-inp" name="staff_name" value="{{ old('staff_name') }}">
                        <input type="text" id="staff_id" class="kinds-inp-hidden" name="staff_id" value="{{ old('staff_id') }}"
                        hidden>
                        @if ($errors->has('staff_id'))
                        <span class="error">{{ $errors->first('staff_id') }}</span>
                        @endif
                    </li>
                    <li class="kinds customerList" >
                        <span>顧客名</span>
                        <div class="kinds-selecter">
                            <span>選択してください</span>
                            <ul class="kind-list" >
                                @foreach ($customers as $customer)
                                    <li data='{{$customer->customer_id}}'>{{$customer->customer_name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <input type="text"  class="kinds-inp" name="customer_name" value="{{ old('customer_name') }}">
                        <input type="text"  class="kinds-inp-hidden" name="customer_id" value="{{ old('customer_id') }}" hidden>
                        @if ($errors->has('customer_id'))
                        <span class="error">{{ $errors->first('customer_id') }}</span>
                        @endif
                        
                    </li>
                    
                    <div class="plus-btn">
                        <button type="button" class="plus">追加</button>
                    </div>
                    <li>
                        <span>日付</span>
                        <input type="date" id="theDate" name="day" value="{{$today}}" placeholder="例：0000-00-00">
                        @if ($errors->has('ap_day'))
                            <span class="error">{{ $errors->first('day') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>時間</span>
                        <input type="time" id="time" name="time" value="{{ old('time') }}" placeholder="例：00-00">
                        @if ($errors->has('time'))
                            <span class="error">{{ $errors->first('time') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>金額</span>
                        <input class="money" type="text" id='demo_input' maxlength="7" oninput="value = value.replace(/[^0-9]+/i,'');" value="{{ old('demo_input') }}" name="total" placeholder="￥">
                        @if ($errors->has('total'))
                            <span class="error">{{ $errors->first('total') }}</span>
                        @endif
                    </li>
                    <div></div>
            </ul>
            <input type="submit" value="登録">
            </form>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/register.js"></script>
<script src="js/bill-register.js"></script>
@endsection