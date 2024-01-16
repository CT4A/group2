@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/header.css')}}">
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('title', 'お知らせ編集')

@section('content')
    <div class="message text-center">
        <div class="alert alert-primary" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
    </div>
    <section class="register">
        <div class="register-area">
            <h1>お知らせ編集</h1>
            <ul>
                <form action="{{route('news')}}" method="POST" id ="newsForm">
                    @csrf
                    <li class="news-resist">
                        <span>内容</span>
                        <textarea id="newsTextarea" name="remarks" value="{{$notification}}">{{$notification->message}}</textarea>
                    </li>
                    <p id = "NewsHidden"></p>
                    <input type="submit" value="編集">
                </form>
            </ul>
        </div>
    </section>
@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
@endsection