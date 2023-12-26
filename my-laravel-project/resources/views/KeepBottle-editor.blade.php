@extends('main')
@yield('title','顧客編集')
@section('styles')
<link rel="stylesheet" href="./css/header.css">
<link rel="stylesheet" href="./css/register.css">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('content')

    <section class="register">
        <div class="register-area">
            <h1>キープボトル情報編集</h1>
            <form action="/KeepBottle-editor" method="POST">
            <ul class="register-areaUL">
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
                            placeholder="種類を入力してください" value="{{ old('customer_name')?? $liquor->customer_name}}">
                        <input type="text" id="customer_id" class="kinds-inp-hidden" name="customer_id"
                            value="{{ old('customer_id')?? $liquor->customer_id}}" hidden>
                    </li>
                    <li class="kinds kinds-aft liquorName">
                        <span>酒名</span>
                        <div class="kinds-selecter">
                            <span>選択してください</span>
                            <ul class="kind-list">
                                @foreach ($liquorNames as $liquorName)
                                    <li>{{$liquorName->liquor_name}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <input type="text" id="liquor_name" class="kinds-inp" name="liquor_name"
                            value="{{ old('liquor_name')?? $liquor->liquor_name}}" placeholder="種類を入力してください">
                    </li>
                    <li class="kinds kinds-aft alcohol">
                        <span>種類</span>
                        <div class="kinds-selecter">
                            <span>選択してください</span>
                            <ul class="kind-list" >
                                @foreach ($liquorTypes as $liquorType)
                                    <li>{{$liquorType->liquor_type}}</li>
                                @endforeach
                            </ul>
                        </div>
                        <input type="text" id="liquor_types" class="kinds-inp" name="liquor_type"
                            value="{{ old('liquor_type')?? $liquor->liquor_type }}" placeholder="種類を入力してください">

                            <input type="text" id="liquor_id" class="kinds-inp-hidden" name="liquor_id"
                        value="{{ old('liquor_id')??  $liquor->liquor_id }}" hidden>
                        <input type="text" id="liquor_id_old"  name="liquor_id_old"
                        value="{{ old('liquor_id_old')??  $liquor->liquor_id}}" hidden>
                        <input type="text" id="liquor_number"  name="liquor_number"
                        value="{{ old('liquor_number')??  $liquor->liquor_number}}" hidden>
                    </li>
                    <li>
                        <span>日付</span>
                        <input type="text" name="liquor_day" value="{{ old('liquor_day')?? $liquor->liquor_day}}">
                        @if ($errors->has('liquor_day'))
                            <span class="error">{{ $errors->first('liquor_day') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>備考</span>
                        <textarea name="remarks" value="">{{ old('remarks') ?? $liquor->remarks }}</textarea>
                    </li>
            </ul>
            <input type="submit" value="編集">  
        </form>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/register.js"></script>
<script src="js/index.js"></script>
@endsection