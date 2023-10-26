@php
use Carbon\Carbon;
$today = Carbon::now()->format('Y/m/d');
@endphp
@extends('main')
@section('title','出勤退勤編集')
@section('styles')
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
            <h1>出勤退勤編集</h1>
            <form action="/history_editor" method="POST">
            @csrf
            <ul class="register-areaUL">
                <input name="staff_id" value="{{$staffAttend->staff_id}}"  hidden>
                <li>
                    <span>日付</span>
                    <input type="date" name="work_date" value="{{$staffAttend->work_date}}" id = "SelDate">
                    <input type="date" name="work_date_old" value="{{$staffAttend->work_date}}" hidden>

                    @if ($errors->has('work_date'))
                    <span class="error">{{ $errors->first('work_date') }}</span>
                    @endif
                </li>
                <li>
                    <span>開始時間</span>
                    <input type="time" name="attend_time" value="{{$staffAttend->attend_time}}">
                    @if ($errors->has('attend_time'))
                    <span class="error">{{ $errors->first('attend_time') }}</span>
                    @endif
                </li>
                <li>
                    <span>終了時間</span>
                    <input type="time" name="leaving_work" value="{{$staffAttend->leaving_work}}">
                    @if ($errors->has('leaving_work'))
                    <span class="error">{{ $errors->first('leaving_work') }}</span>
                    @endif
                </li>
                <li class="kinds">
                    <span>同伴人数</span>
                    <input type="text" id="num_people"  name="num_people"
                        value="{{ old('num_people')?? $staffAttend->num_people }}" style="width:100%;height:100%">
                    @if ($errors->has('num_people'))
                    <span class="error">{{ $errors->first('num_people') }}</span>
                    @endif
                </li>
            </ul>
            <input type="submit" value="編集">
            </form>
        </div>
    </section>
@endsection
@section('scripts')
<script src="js/history.js"></script>
@endsection