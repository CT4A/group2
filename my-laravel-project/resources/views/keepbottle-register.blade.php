@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/header.css')}}">
<link rel="stylesheet" href="{{asset('/css/register.css')}}">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('title', 'キープボトル登録')

@section('content')
<main>
<section class="register">
        <div class="register-area">
            <h1>キープボトル登録</h1>
            <ul>
                <form action="/keepbottle-register" method="POST">
                    @csrf
                    <li>
                        <span>所有者</span>
                        <input type="text" name="customer_name">
                    </li>
                    <li>
                        <span>酒名</span>
                        <input type="text" name="company_name">
                    </li>
                    <li class="kinds">
                        <span>種類</span>
                        <ul class="kind-list">
                            <li>ウイスキー</li>
                            <li>ウイスキー</li>
                            <li>ウイスキー</li>
                            <li>ウイスキー</li>
                            <li>日本酒</li>
                            <li>日本酒</li>
                            <li>日本酒</li>
                            <li>その他</li>
                        </ul>
                    </li>
                    <li>
                        <span>日付</span>
                        <input type="text" name="staff_id">
                    </li>
                    <li>
                        <span>備考</span>
                        <textarea name="remarks" ></textarea>
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