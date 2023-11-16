@extends('main')
<!-- @yield('title','シフト') -->
@section('styles')
<link rel="stylesheet" href="./css/calendar.css">
<link rel="stylesheet" href="./css/register.css">
@endsection
@section('content')
<section class="calendar-field">
    <div id='calendar'>
    </div>
</section>
<div class="test" >
    <div>
        <span>tjeihsdifsdiuhsisudf</span>        
    </div>
</div>
@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="js/work-calendar.js"></script>
<script src="js/register.js"></script>
@endsection