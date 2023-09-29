@extends('main')
<!-- @yield('title','シフト') -->
@section('styles')
<link rel="stylesheet" href="./css/calendar.css">
@endsection
@section('content')
<section class="calendar-field">
    <!-- <div id = "calendarTitle"> 
        <div class="calendar-title-field">
            <h1 id="calendar-year">2023</h1>
            <h2 id="calendar-month"></h2>
            <span id="calendar-day">September</span>
        </div>
    </div> -->
    <div id='calendar'>

    </div>
</section>

@endsection
@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
<script src="js/work-calendar.js"></script>
@endsection