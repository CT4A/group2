@php
use Carbon\Carbon;
$today = Carbon::now()->format('Y/m/d');
@endphp
@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/header.css')}}">
<link rel="stylesheet" href="{{asset('/css/register.css')}}">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('title', 'キープボトル登録')

@section('content')
    <div class="message text-center">
        <div class="alert alert-primary" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
    </div>

    <section class="register">
        <div class="register-area">
            <h1>キープボトル登録</h1>
            <form action="/keepbottle-register" method="POST">
            <ul class="register-areaUL">
                    @csrf
                    <li class="kinds">
                        <span>所有者</span>
                        <div class="kinds-selecter">
                            <span>選択してください</span>
                            <ul class="kind-list" id="">
                                @foreach ($customers as $customer)
                                <li data="{{$customer->customer_id}}">{{$customer->customer_name}}</li>
                                @endforeach
                                <li>その他</li>
                            </ul>
                        </div>
                        <input type="text" id="customer_name" class="kinds-inp" name="customer_name"
                            placeholder="種類を入力してください" value="{{ old('customer_name') }}">
                        <input type="text" id="customer_id" class="kinds-inp-hidden" name="customer_id"
                            value="{{ old('customer_id') }}" hidden>
                        @if ($errors->has('customer_id'))
                        <span class="error">{{ $errors->first('customer_id') }}</span>
                        @endif
                    </li>

                    <li class="kinds alcohol">
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
                            value="{{ old('liquor_type') }}" placeholder="種類を入力してください">
                        @if ($errors->has('liquor_type'))
                            <span class="error">{{ $errors->first('liquor_type') }}</span>
                        @endif
                    </li>
                    <li class="kinds  liquorType">
                        <span>酒名</span>
                        <div class="kinds-selecter">
                            <span>選択してください</span>
                            <ul class="kind-list" id="">
                                <li>chien</li>
                                <li>chien</li>
                            </ul>
                        </div>
                        <input type="text" id="liquor_name" class="kinds-inp" name="liquor_name"
                            value="{{ old('liquor_name') }}" placeholder="種類を入力してください">
                        <input type="text" id="liquor_id" class="kinds-inp" name="liquor_id"
                            value="{{ old('liquor_id') }}" hidden>
                        @if ($errors->has('liquor_id'))
                        <span class="error">{{ $errors->first('liquor_id') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>日付</span>
                        <input type="text" name="liquor_day" value="{{$today}}">
                        @if ($errors->has('liquor_day'))
                        <span class="error">{{ $errors->first('liquor_day') }}</span>
                        @endif
                    </li>
                    <li>
                        <span>備考</span>
                        <textarea name="remarks" value="{{ old('remarks') }}"></textarea>
                    </li>
            </ul>
            <input type="submit" value="登録">
                </form>
        </div>
    </section>

@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
@endsection