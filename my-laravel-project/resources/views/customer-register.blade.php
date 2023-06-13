@extends('main')
@yield('title','顧客登録')
@section('styles')
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
<main>
    <section class="register">
        <div class="register-area">
            <h1>顧客新規作成</h1>
            <ul>
                <form action="/customer-register" method="POST">
                    <!-- @csrf
                    <li>
                        <span>顧客名</span>
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}">
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
                    <!-- <li>
                        <span>担当者</span>
                        <input type="text" name="staff_id" value="{{ old('staff_id') }}">
                        @if ($errors->has('staff_id'))
                            <span class="error">{{ $errors->first('staff_id') }}</span>
                        @endif -->
                    </li>
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
                        <span>備考</span>
                        <input type="text" name="remarks" value="{{ old('remarks') }}">
                        @if ($errors->has('remarks'))
                            <span class="error">{{ $errors->first('remarks') }}</span>
                        @endif
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