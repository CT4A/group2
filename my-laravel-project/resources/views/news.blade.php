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
    <!-- test -->
    <div id="news" class="section-lightgray wf-section">
        <div class="container w-container">
            <h1 class="service-title-h1-large">お知らせ</h1>
        </div>
        <div class="w-container">
            <div class="div-block-29">
                @if ($notifications->isEmpty())
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
                @endif
            </div>
        </div>
    </div>
</main>
@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
@endsection