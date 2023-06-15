@php
use Carbon\Carbon;
$today = Carbon::now()->format('Y/m/d');
@endphp
@extends('main')
@yield('title','register')
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
            <h1>シフト登録</h1>
            <ul>
                <form action="/shift-register" method="POST">
                    @csrf
                <li>
                    <span>日付</span>
                    <input type="text" name="request_date" value="{{$today}}">
                    @if ($errors->has('request_date'))
                    <span class="error">{{ $errors->first('request_date') }}</span>
                    @endif
                </li>
                <li>
                    <span>開始時間</span>
                    <input type="time" name="start_time">
                    @if ($errors->has('start_time'))
                    <span class="error">{{ $errors->first('start_time') }}</span>
                    @endif
                </li>
                <li>
                    <span>終了時間</span>
                    <input type="time" name="end_time">
                    @if ($errors->has('end_time'))
                    <span class="error">{{ $errors->first('end_time') }}</span>
                    @endif
                </li>
                <li>
                    <input type="checkbox" name="time" id="checkbox">
                    <span>同伴がある場合はこちらをチェックしてください。</span>
                </li>
                <ol class="close">
                    <li class="kinds">
                        <span>同伴人数</span>
                        <div class="kinds-selecter">
                        <span>選択してください</span>
                        <ul class="kind-list" id ="staffList">
                            @for ($i = 1; $i < 50; $i++)
                                <li>{{$i}}</li>
                            @endfor
                        </ul> 
                        </div>
                        <input type="text" id="num_people" class="kinds-inp" name="num_people"
                           value="{{ old('num_people') }}">
                        @if ($errors->has('num_people'))
                        <span class="error">{{ $errors->first('num_people') }}</span>
                        @endif
                    </li>
                </ol>
                <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
</main>
@endsection
@section('scripts')
<script src="js/register.js"></script>
@endsection