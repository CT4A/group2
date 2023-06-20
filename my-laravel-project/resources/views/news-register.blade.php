@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/header.css')}}">
<link rel="stylesheet" href="{{asset('/css/news-register.css')}}">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('title', 'お知らせ')

@section('content')
<main>
    <div class="message text-center">
        <div class="alert alert-primary" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
    </div>
    <section class="register">
        <div class="register-area">
            <h1>お知らせ登録</h1>
            <ul>
                <form action="/news-register" method="POST">
                    @csrf
                    <li>
                        <span>内容</span>
                        <!-- <input type="text" name="" value="{{ old('') }}">
                        @if ($errors->has(''))
                        <span class="error">{{ $errors->first('') }}</span>
                        @endif -->
                        <textarea name="remarks" value="{{ old('remarks') }}"></textarea>
                    </li>
                    <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
</main>
@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
@endsection