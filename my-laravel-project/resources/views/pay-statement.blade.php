@php
    use Carbon\Carbon;
    if(request()->has('date')){
        $current = request()->date; 
    }else {
        $current = Carbon::now()->format('Y-m');    
    }
    
@endphp
@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/itiran.css')}}">
@endsection
@section('title', '給料明細')

@section('content')
    <section class="emp-list">
        <div class="emp-list-area">
            <h1>給料明細</h1>
            <div class="date-button-area">
                <div class="btn btn-previous">←</div>
                <div class="btn YearMonth" id="currentDate">{{$current}}</div>
                <div class="btn btn-next">→</div>
            </div>
            <div class="emp-name">
                <ul>
<<<<<<< HEAD
=======
                    <div class="container">
                        <span id="c1">名前</span>
                        <span id="c2">給料</span>
                    </div>
>>>>>>> 1b345df3a67aacfae32ed016193e2345cb3df18c
                    @if ($staffs->isEmpty())
                        <p>データが存在しておりません</p>
                    @else
                        @foreach ($staffs as $staff)
                            <li>
                                <span data-id="{{$staff->staff_id}}">{{$staff->staff_name}}</span>
                                <span data-id="{{$staff->staff_id}}">{{$staff->total}}円</span> 
                            </li>
                        @endforeach
                    @endif
                    
            </ul>
        </div>
    </div>
</section>
<section class="intell">
    <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
        <h1 id="TxtNameHeader">さんの給料明細</h1>
        <ul>
            <li itemprop="identifier">
                <span >基本給</span>
                <span id="basic_salary"></span>
                <span ></span>
            </li>
            <li itemprop="name">
                <span >出勤日数</span>
                <span id="total_working_days"></span>
                <span ></span>
            </li>
            <li itemprop="telephone">
                <span >実働時間</span>
                <span id="total_time"></span>
                <span ></span>
            </li>
            <li itemprop="address">
                <span >同伴</span>
                <span id="total_money_people"></span>
                <span ></span>
            </li>
            <li itemprop="birthDate">
                <span >控除金額</span>
                <span id="deduction"></span>
                <span ></span>
            </li>
            {{-- まだ引かれない --}}
            <li itemprop="description">
                <span >総合金額</span>
                <span id="total_branch"></span>
                <span ></span>
            </li>
            <li itemprop="description">
                <span >総支給額</span>
                <span id="total_salary"></span>
                <span ></span>
            </li>
        </ul>
    </div>
    <div class="intell-close">
            <button>
                <img src="../img/close.png" alt="">
                <span>閉じる</span>
            </button>
        </div>
    @csrf
</section>
@endsection
@section('scripts')
<script src="{{asset('js/payStatement.js')}}"></script>
<script src="{{asset('js/itiran.js')}}"></script>
@endsection