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
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info info-radio">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト</p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info birth-radio">誕生日</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>

                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>


                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info" name="Birthday">誕生日</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>
                    <div role="list" class="w-dyn-items">
                        <a href="/news/20230517" class="link-block-3 w-inline-block">
                            <span class="newspage-time">2023/05/17</span>
                            <span class="newspage-info">お知らせ</span>
                            <span class="newspage-people">松岡</span>
                            <p class="newspage-link">お知らせテスト </p>
                        </a>
                    </div>


                        <!-- <div role="listitem" class="collection-item w-dyn-item">
                            <div class="newspage-time">2023/05/16</div><a href="/news/2023-05-16"
                                class="link-block-3 w-inline-block">
                                <div class="newspage-people">NGUYEN</div><a href="/news/2023-05-01"
                                    class="link-block-3 w-inline-block">
                                    <p class="newspage-link">お知らせテスト </p>
                                </a>
                        </div> -->

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
<script src="{{asset('js/news.js')}}"></script>
@endsection