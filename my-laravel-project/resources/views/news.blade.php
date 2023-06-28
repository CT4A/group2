@php
use Carbon\Carbon;
$today = Carbon::now()->format('Y/m/d');
@endphp
@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/header.css')}}">
<link rel="stylesheet" href="{{asset('/css/news.css')}}">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('title', 'お知らせ')
@section('content')
<main>
    <div id="news" class="section-lightgray wf-section">
        <div class="container w-container">
            <h1 class="service-title-h1-large">お知らせ</h1>
        </div>
        <div class="w-container">
            <div class="div-block-29">
                <section class="news-radio">
                    <input type="radio" name="radio" value="ALL" id="ALL-radio">ALL
                    <input type="radio" name="radio" value="お知らせ" id="info-radio">お知らせ
                    <input type="radio" name="radio" value="誕生日" id="birth-radio">誕生日
                </section>
                <section class="w-dyn-list">
                    
                @if ($notifications->isEmpty() && $customerDatas->isEmpty())
                    <p>お知らせがありません。</p>
                @else
                    @foreach ($notifications as $notification)
                    <div class="w-dyn-list">
                        <div role="list" class="w-dyn-items">
                            <div role="listitem" class="collection-item w-dyn-item">
                                <div class="newspage-time">{{$notification->day}}</div>
                                <div class="newspage-people">{{$notification->staff_name}}</div>
                                <p class="newspage-link">{{$notification->message}} </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @foreach ($customerDatas as $customerData)
                        <div role="list" class="w-dyn-items">
                            <div class="link-block-3 w-inline-block">
                                <span class="newspage-time">{{$customerDatas[0]->birthday}}</span>
                                <span class="newspage-info birth-radio">誕生日</span>
                                <span class="newspage-people">{{$customerDatas[0]->customer_name}}</span>
                                {{-- <p class="newspage-link">お知らせテスト </p> --}}
                            </div>
                        </div>
                    @endforeach
                @endif
                </section>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
<script src="{{asset('js/news.js')}}"></script>
@endsection