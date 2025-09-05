@extends('layouts.app')
@section('css')
  <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
@endsection

@section('content')
<header class="header">
    <div class="header__inner">
        <a class="header__logo im-fell-double-pica-regular" href="/">
        FashionablyLate
        </a>
    </div>
</header>

    <div class="confirm__content">
      <div class="confirm__heading">
        <h2 class="im-fell-double-pica-regular">Confirm</h2>
      </div>
      <form class="form" action="/contacts/store" method="post">
        @csrf
        <input type="hidden" name="last_name" value="{{ $contact['last_name'] }}"/>
        <input type="hidden" name="first_name" value="{{ $contact['first_name'] }}"/>
        <input type="hidden" name="gender" value="{{ $contact['gender'] }}"/>
        <input type="hidden" name="email" value="{{ $contact['email'] }}"/>
        <input type="hidden" name="tel" value="{{ $contact['tel1'].$contact['tel2'].$contact['tel3'] }}"/>
        <input type="hidden" name="address" value="{{ $contact['address'] }}"/>
        <input type="hidden" name="building" value="{{ $contact['building'] }}"/>
        <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}"/>
        <input type="hidden" name="detail" value="{{ $contact['detail'] }}">


        <div class="confirm-table">
          <table class="confirm-table__inner">
            <tr class="confirm-table__row">
              <td class="confirm-table__header">お名前</td>
              <td class="confirm-table__text">{{ $contact['last_name'] }}　{{ $contact['first_name'] }}</td>
            </tr>
            <tr class="confirm-table__row">
              <td class="confirm-table__header">性別</td>
                @if($contact['gender'] == '1')
                  <td class="confirm-table__text" >男性</td>
                @elseif($contact['gender'] == '2')
                  <td class="confirm-table__text" >女性</td>
                @elseif($contact['gender'] == '3')
                  <td class="confirm-table__text" >その他</td>
                @endif
            </tr>
            <tr class="confirm-table__row">
              <td class="confirm-table__header">メールアドレス</td>
              <td class="confirm-table__text">{{ $contact['email'] }}</td>
            </tr>
            <tr class="confirm-table__row">
              <td class="confirm-table__header">電話番号</td>
              <td class="confirm-table__text">{{ $contact['tel1'].$contact['tel2'].$contact['tel3'] }}</td>
            </tr>
            <tr class="confirm-table__row">
              <td class="confirm-table__header">住所</td>
              <td class="confirm-table__text">{{ $contact['address'] }}</td>
            </tr>
            <tr class="confirm-table__row">
              <td class="confirm-table__header">建物名</td>
              <td class="confirm-table__text">{{ $contact['building'] }}</td>
            </tr>
            <tr class="confirm-table__row">
              <td class="confirm-table__header">お問い合わせの種類</td>
              @if($contact['category_id'] == '1')
                  <td class="confirm-table__text" >商品のお届けについて</td>
                @elseif($contact['category_id'] == '2')
                  <td class="confirm-table__text" >商品の交換について</td>
                @elseif($contact['category_id'] == '3')
                  <td class="confirm-table__text" >商品トラブル</td>
                @elseif($contact['category_id'] == '4')
                  <td class="confirm-table__text" >ショップへのお問い合わせ</td>
                @elseif($contact['category_id'] == '5')
                  <td class="confirm-table__text" >その他</td>
              @endif
            </tr>
            <tr class="confirm-table__row">
              <td class="confirm-table__header">お問い合わせ内容</td>
              <td class="confirm-table__text-detail">{{ $contact['detail'] }}
              </td>
            </tr>
          </table>
        </div>
        <div class="form__button">
          <button class="form__button-submit" type="submit">送信</button>
          <button class="form__button-back" type="button" onClick="history.back()" >修正</button>
        </div>
      </form>
    </div>
@endsection