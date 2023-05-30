@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/itiran.css')}}">
@endsection
@section('title', '一覧社員')

@section('content')
<main>
    <section class="emp-list">
        <div class="emp-list-area">
        <h1>社員一覧</h1>
        <form action="#">
                <button type="submit">
                    <img src="./img/oqCh3X9ndfQ__xOuxd5Oww==.png" alt="">
                </button>
                <input type="text" placeholder="顧客の名前を入力してください">
        </form>
        <div class="emp-name">
        <ul>
            @foreach ($staffs as $staff)
                <li><span id={{$staff->staff_id}}>{{$staff->staff_name}}</span></li>
            @endforeach
        </ul>
    </div>
</div>
    </section>
    <section class="intell">
        <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
        <h1 id="TxtNameHeader">〇〇の情報</h1>
            <ul>
                    <li itemprop="identifier">
                        <span>番号</span>
                        <span id="staff_id">01</span>
                    </li>
                    <li itemprop="name">
                        <span>名前</span>
                        <span id="staff_name">名古屋タロウ</span>
                    </li>
                    <li itemprop="telephone">
                        <span>電話番号</span>
                        <span id="tel">090-6332-2128</span>
                    </li>
                    <li itemprop="address">
                        <span>住所</span>
                        <span id="residence">あああああああああ</span>
                    </li>
                    <li itemprop="birthDate">
                        <span>誕生日</span>
                        <span id="birthday">1990-01-01</span>
                    </li>
                    <li itemprop="description">
                        <span>備考</span>
                        <span id="remarks">テキストテキストテキストテキストテキストテキストテキストテキストテキストテキストテキスト</span>
                    </li>
            </ul>
        </div>
        @csrf
    </section>
</main>
@endsection
@section('scripts')
<script src="{{asset('js/itiran.js')}}"></script>
@endsection