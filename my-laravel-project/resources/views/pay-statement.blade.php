@extends('main')
@section('styles')
<link rel="stylesheet" href="{{asset('css/pay-statement.css')}}">
@endsection
@section('title', '社員一覧')

@section('content')
<main>
    <section class="emp-list">
        <div class="emp-list-area">
            <h1>給料明細</h1>
            <form action="#">
                <button type="submit">
                    <img src="./img/oqCh3X9ndfQ__xOuxd5Oww==.png" alt="">
                </button>
                <input type="text" placeholder="社員の名前を入力してください">
            </form>
            <div class="emp-name">
                <ul>
                    <li>
                        <span id="1">名前</span>
                        <span id="1">給料</span>
                    </li>
                    <li>
                        <span id="1">NGUYEN</span>
                        <span id="1">19,0000円</span>
                    </li>
                    <li>
                        <span id="1">CHIEN</span>
                        <span id="1">19,0000円</span>
                    </li>
                    <li>
                        <span id="1">CHIEN</span>
                        <span id="1">19,0000円</span>
                    </li>
                    <li>
                        <span id="1">CHIEN</span>
                        <span id="1">19,0000円</span>
                    </li>
                    <li>
                        <span id="1">CHIEN</span>
                        <span id="1">19,0000円</span>
                    </li>
                    <li>
                        <span id="1">CHIEN</span>
                        <span id="1">19,0000円</span>
                    </li>
                    <li>
                        <span id="1">CHIEN</span>
                        <span id="1">19,0000円</span>
                    </li>
                    <li>
                        <span id="1">CHIEN</span>
                        <span id="1">19,0000円</span>
                    </li>
                    <li>
                        <span id="1">CHIEN</span>
                        <span id="1">19,0000円</span>
                    </li>

                </ul>
            </div>
        </div>
    </section>
    <section class="intell">
        <div class="intell-aera" itemscope itemtype="http://schema.org/Person">
            <h1 id="TxtNameHeader">さんの給料明細</h1>
            <ul>
                <li itemprop="identifier">
                    <span>基本給</span>
                    <span>1000円</span>
                    <span id="staff_id"></span>
                </li>
                <li itemprop="name">
                    <span>出勤日数</span>
                    <span>24日</span>
                    <span id="staff_name"></span>
                </li>
                <li itemprop="telephone">
                    <span>実働時間</span>
                    <span>170時間</span>
                    <span id="tel"></span>
                </li>
                <li itemprop="address">
                    <span>同伴</span>
                    <span>5,0000円</span>
                    <span id="residence"></span>
                </li>
                <li itemprop="address">
                    <span>回数</span>
                    <span>2回</span>
                    <span id="residence"></span>
                </li>
                <li itemprop="birthDate">
                    <span>控除金額</span>
                    <span>6000円</span>
                    <span id="birthday"></span>
                </li>
                <li itemprop="description">
                    <span>基本給総合</span>
                    <span>19,0000円</span>
                    <span id="remarks"></span>
                </li>
                <li itemprop="description">
                    <span>総支給額</span>
                    <span>23,0000円</span>
                    <span id="remarks"></span>
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