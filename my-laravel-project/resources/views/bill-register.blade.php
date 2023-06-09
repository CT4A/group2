@extends('main')
@yield('title','顧客登録')
@section('styles')
<link rel="stylesheet" href="./css/bill-header.css">
<link rel="stylesheet" href="./css/bill-register.css">
<link rel="stylesheet" href="./css/information.css">
<link rel="stylesheet" href="./css/bill-register.js">
@endsection
@section('content')
<main>
    <section class="register">
        <div class="register-area">
            <h1>伝票登録</h1>
            <ul>
                <form action="/customer-register" method="POST">
                    @csrf
                    <li>
                        <span>顧客名</span>
                        <input type="text" name="customer_name" value="{{ old('customer_name') }}">
                        @if ($errors->has('customer_name'))
                        <span class="error">{{ $errors->first('customer_name') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>社員名</span>
                        <input type="text" name="company_name" value="{{ old('company_name') }}">
                        @if ($errors->has('company_name'))
                        <span class="error">{{ $errors->first('company_name') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>日付</span>
                        <!-- <input type="text" name="birthday" value="{{ old('birthday') }}"> -->
                        <input type="date" id="theDate">
                        @if ($errors->has('birthday'))
                        <span class="error">{{ $errors->first('birthday') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>人数</span>
                        <input type="text" name="staff_id" value="{{ old('staff_id') }}">
                        @if ($errors->has('staff_id'))
                        <span class="error">{{ $errors->first('staff_id') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>テーブル番号</span>
                        <input type="text" name="staff_id" value="{{ old('staff_id') }}">
                        @if ($errors->has('staff_id'))
                        <span class="error">{{ $errors->first('staff_id') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>金額</span>
                        <input class="money" type="text" id='demo_input' placeholder="￥">
                        <!-- <input type="text" class="number" value="￥"> -->

                        @if ($errors->has('remarks'))
                        <span class="error">{{ $errors->first('remarks') }}</span>
                        @endif
                    </li>
                    <div></div>
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
<script src="js/bill-register.js"></script>
@endsection