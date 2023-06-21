@extends('main')
@yield('title','シフト')
@section('styles')
    
@endsection
@section('content')
<div id='calendar'></div>
@endsection
@section('scripts')
<script src="js/work-calendar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.8/index.global.min.js"></script>
@endsection