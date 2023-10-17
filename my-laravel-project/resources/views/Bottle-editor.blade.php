@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/header.css')}}">
<link rel="stylesheet" href="{{asset('/css/register.css')}}">
<link rel="stylesheet" href="./css/information.css">
@endsection
@section('title', 'ボトル編集')

@section('content')
    <div class="message text-center">
        <div class="alert alert-primary" role="alert">
            <strong>{{session('message')}}</strong>
        </div>
    </div>
    <section class="register">
        <div class="register-area">
            <h1>ボトル情報編集</h1>
            <form action="/bottle-editor" method="POST">
                    @csrf
            <ul class="register-areaUL">
                <li>
                    <span>酒名</span>
                    <input type="text" name="liquor_name" value="{{ old('liquor_name')?? $liquor->liquor_name }}" readonly>
                        @if ($errors->has('liquor_name'))
                            <span class="error">{{ $errors->first('liquor_name') }}</span>
                        @endif
                        <input type="text" name="liquor_id" value="{{ old('liquor_id')?? $liquor->liquor_id }}" hidden>
                </li>
                    <li class="kinds">
                        <span>種類</span>
                        
                        <input type="text" id="liquor_type" value="{{ old('liquor_type')?? $liquor->liquor_type }}" class="kinds-inp"
                            name="liquor_type" placeholder="種類を入力してください" style="height: 100%;width:100%;">
                            @if ($errors->has('liquor_type'))
                                <span class="error">{{ $errors->first('liquor_type') }}</span>
                            @endif
                    </li>
                    
                    <input type="submit" value="編集    ">            
                </ul>
        </div>
        </form>
    </section>
@endsection
@section('scripts')
<script src="{{asset('js/register.js')}}"></script>
@endsection