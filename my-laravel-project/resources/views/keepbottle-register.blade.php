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
                    <li class="kinds">
                        <span>所有者</span>
                        <div class="kinds-selecter">
                        <span>選択してください</span>
                        <ul class="kind-list" id ="">
                            @foreach ($customers as $customer)
                                <li data="{{$customer->customer_id}}">{{$customer->customer_name}}</li>
                            @endforeach
                            <li>その他</li>
                        </ul> 
                        </div>
                        <input type="text" id ="customer_name" class="kinds-inp" name="customer_name" placeholder="種類を入力してください">  
                        <input type="text" id ="customer_id" class="kinds-inp-hidden" name="customer_id" value="" hidden>      
                    </li>
                    <li class="kinds alcohol">
                        <span>酒名</span>
                        <div class="kinds-selecter">
                        <span>選択してください</span>
                        <ul class="kind-list" id ="">
                            @foreach ($liquors as $liquor)
                                <li>{{$liquor->liquor_name}}</li>
                            @endforeach
                            <li>その他</li>
                        </ul> 
                        </div>
                        <input type="text" id ="liquor_type" class="kinds-inp" name="liquor_name" placeholder="種類を入力してください">   
                    </li>
                    <li class="kinds liquorType">
                        <span>種類</span>
                        <div class="kinds-selecter">
                        <span>選択してください</span>
                        <ul class="kind-list" id ="">
                            
                            {{-- <li>その他</li> --}}
                        </ul> 
                        </div>
                        <input type="text" id ="liquor_type" class="kinds-inp" name="liquor_name" placeholder="種類を入力してください">   
                    </li>
                    <li>
                        <span>日付</span>
                        <input type="text" name="liquor_day">
                    </li>
                    <li>
                        <span>備考</span>
                        <textarea name="remarks"></textarea>
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