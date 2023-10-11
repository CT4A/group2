@extends('main')
@yield('title','顧客編集')
@section('styles')
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')
<div class="message text-center">
        <div class="alert alert-primary" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
    </div>
    <section class="register">
        <div class="register-area">
            <h1>キープボトル情報編集</h1>
            <ul class="register-areaUL">
                <form action="/keepbottle-register" method="POST">
                    @csrf
                    <li class="kinds kinds-aft">
                        <span>所有者</span>
                        <div class="kinds-selecter">
                            <span>選択してください</span>
                            <ul class="kind-list" id="">
                                @foreach ($customers as $customer)
                                    <li><span id="{{$customer->customer_id}}">{{$customer->customer_name}}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <input type="text" id="customer_name" class="kinds-inp" name="customer_name"
                            placeholder="種類を入力してください" value="{{ old('customer_name')}}">
                        <input type="text" id="customer_id" class="kinds-inp-hidden" name="customer_id"
                            value="" hidden>
                    </li>
                    <li class="kinds kinds-aft liquorType">
                        <span>酒名</span>
                        <div class="kinds-selecter">
                            <span>選択してください</span>
                            <ul class="kind-list" id="">
                                @foreach ($liquors as $liquor)
                                    <li><span id="{{$liquor->liquor_id}}">{{$liquor->liquor_name}}</span></li>
                                @endforeach
                            </ul>
                        </div>
                        <input type="text" id="liquor_name" class="kinds-inp" name="liquor_name"
                            value="" placeholder="種類を入力してください">
                        <input type="text" id="liquor_id" class="kinds-inp" name="liquor_id"
                            value="" hidden>
                    </li>
                    <li class="kinds kinds-aft alcohol">
                        <span>種類</span>
                        <div class="kinds-selecter">
                            <span>選択してください</span>
                            <ul class="kind-list" id="">
                                @foreach ($liquors as $liquor)
                                    <li>{{$liquor->liquor_type}}</li>
                                @endforeach
                                {{-- <li>その他</li> --}}
                            </ul>
                        </div>
                        <input type="text" id="liquor_type" class="kinds-inp" name="liquor_type"
                            value="" placeholder="種類を入力してください">
                    </li>
                    <li>
                        <span>日付</span>
                        <input type="text" name="liquor_day" value="">
                    </li>
                    <li>
                        <span>備考</span>
                        <textarea name="remarks" value=""></textarea>
                    </li>
                    <input type="submit" value="登録">
                </form>
            </ul>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/register.js"></script>
<script src="js/index.js"></script>
@endsection