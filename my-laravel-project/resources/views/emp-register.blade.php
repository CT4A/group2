@extends('main')
{{-- @yield('title','社員登録') --}}
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
            <h1>社員新規作成</h1>
            <form action="/emp-register" method="POST">
            <ul class="register-areaUL">
                @if (isset($message))
                <p>{{$message}}</p>
                @endif
                    @csrf
                    <li>
                        <span>社員名</span>
                        <input type="text" name="staff_name" value="{{ old('staff_name') }}">
                    </li>
                    @if ($errors->has('staff_name'))
                            <span class="error">※{{ $errors->first('staff_name') }}</span>
                        @endif
                    <li>
                        <span>電話番号</span>
                        <input type="text" name="tel" value="{{ old('tel') }}">
                    </li>
                    @if ($errors->has('tel'))
                            <span class="error">※{{ $errors->first('tel') }}</span>
                        @endif
                    <li>
                        <span>住所</span>
                        <input type="text" name="residence"  value="{{ old('residence') }}">
                    </li>
                    @if ($errors->has('residence'))
                            <span class="error">※{{ $errors->first('residence') }}</span>
                        @endif
                    <li>
                        <span>誕生日</span>
                        <input type="date" name="birthday"  value="{{ old('birthday') }}">
                        @if ($errors->has('birthday'))
                            <span class="error">※{{ $errors->first('birthday') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>時給</span>
                        <input type="text" name="hourly_wage"  value="{{ old('hourly_wage') }}"  placeholder="￥">
                    </li>
                    @if ($errors->has('hourly_wage'))
                            <span class="error">※{{ $errors->first('hourly_wage') }}</span>
                        @endif
                    <li>
                        <span>備考</span>
                        <textarea name="remarks"  value="{{ old('remarks') }}"></textarea>
                    </li>
                    @if ($errors->has('remarks'))
                            <span class="error">※{{ $errors->first('remarks') }}</span>
                        @endif
            </ul>
            <input type="submit" value="登録">
            </form>
        </div>
    </section>

@endsection
@section('scripts')
<script src="js/register.js"></>
<script src="js/index.js"></script>
@endsection