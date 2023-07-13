@extends('main')
@yield('title','顧客登録')
@section('styles')
<link rel="stylesheet" href="./css/header.css">
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
            <h1>顧客新規作成</h1>
            <form action="/customer-register" method="POST">
            <ul class="register-areaUL">
                    @csrf
                    <li>
                        <span>顧客名</span>
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}">
                        @if ($errors->has('customer_name'))
                            <span class="error">{{ $errors->first('customer_name') }}</span>
                        @endif
                    </li> 
                    
                    <li>
                        <span>会社名</span>
                        <input type="text" name="company_name" value="{{ old('company_name') }}">
                        @if ($errors->has('company_name'))
                            <span class="error">{{ $errors->first('company_name') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>誕生日</span>
                        <input type="text" name="birthday" value="{{ old('birthday') }}">
                        @if ($errors->has('birthday'))
                            <span class="error">{{ $errors->first('birthday') }}</span>
                        @endif
                    </li>
                   
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
                        <span>備考</span>
                        <input type="text" name="remarks" value="{{ old('remarks') }}">
                        @if ($errors->has('remarks'))
                            <span class="error">{{ $errors->first('remarks') }}</span>
                        @endif
                    </li>
            </ul>
            <input type="submit" value="登録">
            </form>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/register.js"></script>
<script src="js/index.js"></script>
@endsection