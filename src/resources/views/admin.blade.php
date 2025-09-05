@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection

@section('content')
<header class="header">
    <form class="header__inner" action="/logout" method="post">
    @csrf
        <a class="header__logo im-fell-double-pica-regular" href="">FashionablyLate</a>
        <button class="log-button">logout</button>
    </form>
</header>

<div class="admin__content">
    <div class="admin__heading">
        <h2 class="im-fell-double-pica-regular">Admin</h2>
    </div>
    
    <div class="admin__search-items">
        <form class="search-item" action="/admin/search" method="get">
        @csrf
            <input class="search-item__input-text" type="text" name="keyword" value="{{ old('keyword') }}" placeholder="名前やメールアドレスを入力してください">
            <select class="search-item__input-gender" name="gender">
                <option value="">性別</option>
                <option value="all">全て</option>
                <option value="1">男性</option>
                <option value="2">女性</option>
                <option value="3">その他</option>
            </select>
            <select class="search-item__input-category" name="category_id">
                <option value="">お問い合わせの種類</option>
                @foreach( $categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                @endforeach
            </select>
            <input class="search-item__input-date" type="date" name="date">
            <button class="search-item__button--submit" type="submit">検索</button>
        </form>
        <form action="" class="search-item__button">
            <button class="search-item__button--reset" type="submit">リセット</button>
        </form>
    </div>

    <div class="admin__change-items">
        <button class="admin__export-button" type="submit">エクスポート</button>
        <div class="admin__pagination"></div>
    </div>

    <div class="admin-table">
        <table class="admin-table__inner">
            <tr class="admin-table__row">
                <td class="admin-table__header">
                    <div class="admin-table__text-name">お名前</div>
                    <div class="admin-table__text-gender">性別</div>
                    <div class="admin-table__text-mail">メールアドレス</div>
                    <div class="admin-table__text-contact">お問い合わせの種類</div>
                    <div class="admin-table__modal-window"></div>
                </td>
            </tr>
            @foreach( $contacts as $contact )
            <tr class="admin-table__row">
                <td class="admin-table__text">
                    <div class="admin-table__text-name">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</div>
                    <div class="admin-table__text-gender">
                    @php
                    if ($contact['gender'] == '1'){
                        echo '男性';
                    }else if ($contact['gender'] == '2'){
                        echo '女性';
                    }else if ($contact['gender'] == '3'){
                        echo 'その他';
                    }
                    @endphp
                    </div>
                    <div class="admin-table__text-mail">{{ $contact['email'] }}</div>
                    <div class="admin-table__text-contact">{{ $contact['category']['content'] }}</div>
                    <form class="admin-table__modal-window" action="">
                        <button class="admin-table__modal-window--button">詳細</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>

</div>
@endsection