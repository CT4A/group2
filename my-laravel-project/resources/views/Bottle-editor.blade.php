@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/header.css')}}">
<link rel="stylesheet" href="{{asset('/css/register.css')}}">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('title', 'ボトル編集')

@section('content')
    <div class="message text-center">
        <div class="alert alert-primary" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
    </div>
    <section class="register">
        <div class="register-area">
            <h1>ボトル情報編集</h1>
            <form action="/bottle-register" method="POST">
                    @csrf
            <ul class="register-areaUL">
                    <li class="kinds">
                        <span>種類</span>
                        <div class="kinds-selecter">
                            <span>選択してください</span>
                            <ul class="kind-list" id="">
                                <li>その他</li>
                            </ul>
                        </div>
                        <input type="text" id="liquor_type" value="{{ old('liquor_type') }}" class="kinds-inp"
                            name="liquor_type" placeholder="種類を入力してください">
                        @if ($errors->has('liquor_type'))
                        <span class="error">{{ $errors->first('liquor_type') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>酒名</span>
                        <input type="text" name="liquor_name" value="{{ old('liquor_name') }}">
                        @if ($errors->has('liquor_name'))
                        <span class="error">{{ $errors->first('liquor_name') }}</span>
                        @endif
                    </li>
                    <input type="submit" value="登録">            
                </ul>
        </div>
        </form>
    </section>
@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
@endsection