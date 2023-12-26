@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/itiran.css')}}">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
@endsection
@section('title', '個人情報')
@section('content')
    <section class="staff-profile">
        <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
            <h1 id="TxtNameHeader">情報</h1>
            <ul>
                <li itemprop="identifier">
                    <span>番号</span>
                    <span id="staff_id">{{$staff->staff_id}}</span>
                </li>
                <li itemprop="name">
                    <span>名前</span>
                    <span id="staff_name">{{$staff->staff_name}}</span>
                </li>
                <li itemprop="telephone">
                    <span>電話番号</span>
                    <span id="tel">{{$staff->tel}}</span>
                </li>
                <li itemprop="address">
                    <span>住所</span>
                    <span id="residence">{{$staff->residence}}</span>
                </li>
                <li itemprop="birthDate">
                    <span>誕生日</span>
                    <span id="birthday">{{$staff->birthday}}</span>
                </li>
                <li itemprop="description">
                    <span>備考</span>
                    <span id="remarks">{{$staff->remarks}}</span>
                </li>
                <li>
                    <form action = "#">
                            <button id="editBtn">    
                                <img src="img\edit.png" alt="">
                                <span>編集</span>
                            </button>
                        </form>
                    </li>
            </ul>
        </div>
        @csrf
    </section>
@endsection
@section('scripts')
<script src="{{asset('js/staffprofile.js')}}"></script>
@endsection