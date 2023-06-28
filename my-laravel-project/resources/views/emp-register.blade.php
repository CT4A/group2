@extends('main')
{{-- @yield('title','社員登録') --}}
@section('styles')
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
<main>
    <div class="message text-center">
        <div class="alert alert-primary" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
    </div>
    <section class="register">
        <div class="register-area">
            <h1>社員新規作成</h1>
            <ul>
                @if (isset($message))
                    <script>alert({{$message}})</script>
                @endif
                <form action="/emp-register" method="POST">
                    @csrf
                    <li>
                        <span>社員名</span>
                        <input type="text" name="staff_name" value="{{ old('staff_name') }}">
                        @if ($errors->has('staff_name'))
                            <span class="error">{{ $errors->first('staff_name') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>電話番号</span>
                        <input type="text" name="tel" value="{{ old('tel') }}">
                        @if ($errors->has('tel'))
                            <span class="error">{{ $errors->first('tel') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>住所</span>
                        <input type="text" name="residence"  value="{{ old('residence') }}">
                        @if ($errors->has('residence'))
                            <span class="error">{{ $errors->first('residence') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>誕生日</span>
                        <input type="date" name="birthday"  value="{{ old('birthday') }}">
                        @if ($errors->has('birthday'))
                            <span class="error">{{ $errors->first('birthday') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>時給</span>
                        <input type="text" name="hourly_wage"  value="{{ old('hourly_wage') }}"  placeholder="￥">
                        @if ($errors->has('hourly_wage'))
                            <span class="error">{{ $errors->first('hourly_wage') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>備考</span>
                        <textarea name="remarks"  value="{{ old('remarks') }}"></textarea>
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