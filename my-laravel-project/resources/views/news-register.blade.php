@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/header.css')}}">
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('title', 'お知らせ')

@section('content')
    <div class="message text-center">
        <div class="alert alert-primary" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
    </div>
    <section class="register">
        <div class="register-area">
            <h1>お知らせ登録</h1>
            <ul>
                <form action="/news" method="POST">
                    @csrf
                    <li class="news-resist">
                        <span>内容</span>
                        <textarea name="remarks" value="{{ old('remarks') }}"></textarea>
                    </li>
                    <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
@endsection