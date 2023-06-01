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
            <h1>顧客新規作成</h1>
            <ul>
                <form action="/customer-register" method="POST">
                    @csrf
                    <li>
                        <span>顧客名</span>
                        <input type="text" name="customer_name">
                    </li>
                    <li>
                        <span>会社名</span>
                        <input type="text" name="company_name">
                    </li>
                    <li>
                        <span>誕生日</span>
                        <input type="text" name="birthday">
                    </li>
                    <li>
                        <span>担当者</span>
                        <input type="text" name="staff_id">
                    </li>
                    <li>
                        <span>備考</span>
                        <input type="text" name="remarks">
                    </li>
                    <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
</main>
@endsection
@section('scripts')
<script src="{{asset('js/itiran.js')}}"></script>
@endsection