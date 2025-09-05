@extends('layouts.app_auth')

@section('css')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">
@endsection

@section('content')
<body>
    <div class="register__wrapper">
        <header class="header">
            <div class="header__inner">
                <a class="header__logo im-fell-double-pica-regular" href="">FashionablyLate</a>
                <a class="log-button" href="/register">register</a>
            </div>
        </header>

        <div class="register__heading">
            <h2 class="im-fell-double-pica-regular">Login</h2>
        </div>
        <div class="register__content">
            <form action="/login" class="register__form" method="post">
            @csrf
                <div class="register__form--item">
                    <p>メールアドレス</p>
                    <input type="email" class="register__form--item-input" name="email" placeholder="例:test@example.com" value="{{ old('email') }}">
                </div>

                <div class="register__form--item">
                    <p>パスワード</p>
                    <input type="password" class="register__form--item-input" name="password" placeholder="例:coachtechno6">
                </div>

                <div class="register__form--button">
                    <button class="register__form--button-submit">ログイン</button>
                </div>

            </form>
        </div>
    </div>
</body>
@endsection
