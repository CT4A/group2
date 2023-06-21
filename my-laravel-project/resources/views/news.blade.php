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
                <div class="w-dyn-list">
                    <div role="list" class="w-dyn-items">
                        <div role="listitem" class="collection-item w-dyn-item">
                            <div class="newspage-time">2023/05/16</div>
                            <div class="newspage-people">NGUYEN</div>
                            <p class="newspage-link">お知らせテスト </p>
                        </div>
                        <div role="listitem" class="collection-item w-dyn-item">
                            <div class="newspage-time">2023/05/16</div><a href="/news/2023-05-16"
                                class="link-block-3 w-inline-block">
                                <div class="newspage-people">NGUYEN</div><a href="/news/2023-05-01"
                                    class="link-block-3 w-inline-block">
                                    <p class="newspage-link">お知らせテスト </p>
                                </a>
                        </div>
                        <div role="listitem" class="collection-item w-dyn-item">
                            <div class="newspage-time">2023/05/16</div><a href="/news/2023-05-16"
                                class="link-block-3 w-inline-block">
                                <div class="newspage-people">NGUYEN</div><a href="/news/2023-05-01"
                                    class="link-block-3 w-inline-block">
                                    <p class="newspage-link">お知らせテスト </p>
                                </a>
                        </div>
                        <div role="listitem" class="collection-item w-dyn-item">
                            <div class="newspage-time">2023/05/16</div><a href="/news/2023-05-16"
                                class="link-block-3 w-inline-block">
                                <div class="newspage-people">NGUYEN</div><a href="/news/2023-05-01"
                                    class="link-block-3 w-inline-block">
                                    <p class="newspage-link">お知らせテスト </p>
                                </a>
                        </div>
                        <div role="listitem" class="collection-item w-dyn-item">
                            <div class="newspage-time">2023/05/16</div><a href="/news/2023-05-16"
                                class="link-block-3 w-inline-block">
                                <div class="newspage-people">NGUYEN</div><a href="/news/2023-05-01"
                                    class="link-block-3 w-inline-block">
                                    <p class="newspage-link">お知らせテスト </p>
                                </a>
                        </div>
                        <div role="listitem" class="collection-item w-dyn-item">
                            <div class="newspage-time">2023/05/16</div><a href="/news/2023-05-16"
                                class="link-block-3 w-inline-block">
                                <div class="newspage-people">NGUYEN</div><a href="/news/2023-05-01"
                                    class="link-block-3 w-inline-block">
                                    <p class="newspage-link">お知らせテスト </p>
                                </a>
                        </div>
                        <div role="listitem" class="collection-item w-dyn-item">
                            <div class="newspage-time">2023/05/16</div>
                            <div class="newspage-people">NGUYEN</div>
                            <p class="newspage-link">お知らせテスト </p>
                        </div>
                        <div role="listitem" class="collection-item w-dyn-item">
                            <div class="newspage-time">2023/05/16</div>
                            <div class="newspage-people">NGUYEN</div>
                            <p class="newspage-link">お知らせテスト </p>
                        </div>
                        <!-- test -->
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="container-13 w-container"><a href="/service/news" target="_blank"
                class="btn-secondary-center outline w-inline-block">
                <div class="btn-text">もっと見る</div>
            </a></div> -->
    </div>

</main>
@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
@endsection