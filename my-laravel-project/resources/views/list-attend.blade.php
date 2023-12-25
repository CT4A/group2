@extends('main')
        @section('styles')
        <link rel="stylesheet" href="{{asset('css/itiran.css')}}">
        <link rel="stylesheet" href="{{asset('css/header.css')}}">
        <link rel="stylesheet" href="{{asset('css/itiran.css')}}">
        @endsection
        @if (Auth::user()->isAdmin())
            <title>出勤退勤履歴用社員一覧</title>
        @else
            <title>出勤用社員一覧</title>
        @endif
@if (Auth::user()->isAdmin())
    @section('content')
    <body>
        <section class="attend-list">
        <div class="emp-list-area">
        <h1>出勤退勤履歴用社員一覧</h1>
        <form action="#" class="search">
                <button type="submit">
                    <img src="./img/oqCh3X9ndfQ__xOuxd5Oww==.png" alt="">
                </button>
                <input id="search" type="text" placeholder="社員の名前を入力してください">
        </form>
        <div class="emp-name">
            <ul>
                @foreach ($staffs as $staff)
                <a href="{{route('history',['id' => $staff->staff_id])}}">
                        <li id="{{$staff->staff_id}}" >
                            <span class="StaffID">{{$staff->staff_id}}</span>
                            <span class="StaffName">{{$staff->staff_name}}</span>
                        </li>
                    </a>
                @endforeach
            </ul>
    </div>
</div>
@else
@section('content')
    <title>出勤用社員一覧</title>
    </head>
    <body>
        <section class="attend-list">
        <div class="emp-list-area">
        <h1>出勤用社員一覧</h1>
        <form action="#" class="search">
            <button type="submit">
                <img src="./img/oqCh3X9ndfQ__xOuxd5Oww==.png" alt="">
            </button>
            <input id="search" type="text" placeholder="社員の名前を入力してください">
        </form>
        <div class="emp-name">
            <ul>
                @foreach ($staffs as $staff)
                <a href="{{route('syukkin')}}">
                    <li id="{{$staff->staff_id}}" >
                        <span class="StaffID">{{$staff->staff_id}}</span>
                        <span class="StaffName">{{$staff->staff_name}}</span>
                    </li>
                    </a>
                @endforeach
            </ul>
    </div>
</div>
@endif
@endsection
@section('scripts')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('js/ListAttend.js')}}"></script>
</body>
</html>
