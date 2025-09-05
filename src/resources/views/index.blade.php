@extends('layouts.app')
@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}" />
@endsection

@section('content')
<header class="header">
    <div class="header__inner">
        <a class="header__logo im-fell-double-pica-regular" href="/">
        FashionablyLate
        </a>
    </div>
</header>

    <div class="contact-form__content">
      <div class="contact-form__heading">
        <h2 class="im-fell-double-pica-regular">Contact1</h2>
      </div>
      <form class="form" action="/contacts/confirm" method="post">
        @csrf
        
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お名前</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text-name">
              <input class="form__input--last-name" type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}" />
              <input class="form__input--first-name" type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}" />
            </div>
            <div class="form__error">
              @error('last_name')
              {{ $message }}
              @enderror
            </div>
            <div class="form__error">
              @error('first_name')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">性別</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text-radio">
              <div class="form__input--radio">
                <input type="radio" class="form__input--radio-button" name="gender" value="1" id="男性" checked><label for="男性">男性</label>
              </div>
              <div class="form__input--radio">
                <input type="radio" class="form__input--radio-button" name="gender" value="2" id="女性"><label for="女性">女性</label>
              </div>
              <div class="form__input--radio">
                <input type="radio" class="form__input--radio-button" name="gender" value="3" id="その他"><label for="その他">その他</label>
              </div>
            </div>
            <div class="form__error">
              @error('gender')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">メールアドレス</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input class="form__input--address" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" />
            </div>
            <div class="form__error">
              @error('email')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">電話番号</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text-tel">
              <input class="form__input-tel" type="tel" name="tel1" placeholder="090" value="{{ old('tel1') }}" />
              <span class="form__input-tel--hyphen">-</span>
              <input class="form__input-tel" type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}" />
              <span class="form__input-tel--hyphen">-</span>
              <input class="form__input-tel" type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}" />
            </div>
            <div class="form__error">
              @error('tel1')
              {{ $message }}
              @enderror
            </div>
            <div class="form__error">
              @error('tel2')
              {{ $message }}
              @enderror
            </div>
            <div class="form__error">
              @error('tel3')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">住所</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input class="form__input--address" type="text" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}" />
            </div>
            <div class="form__error">
              @error('address')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">建物名</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text">
              <input class="form__input--address" type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}" />
            </div>
          </div>
        </div>
        
        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせの種類</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text-category">
              <select class="form__input--select" name="category_id">
                <option value="">選択してください</option>
                @foreach( $categories as $category )
                  <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                @endforeach
              </select>
            </div>
            <div class="form__error">
              @error('category_id')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>

        <div class="form__group">
          <div class="form__group-title">
            <span class="form__label--item">お問い合わせ内容</span>
            <span class="form__label--required">※</span>
          </div>
          <div class="form__group-content">
            <div class="form__input--text-contact">
              <textarea class="form__input--textarea" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('content') }}</textarea>
            </div>
            <div class="form__error">
              @error('detail')
              {{ $message }}
              @enderror
            </div>
          </div>
        </div>
        
        <div class="form__button">
          <button class="form__button-submit" type="submit">確認画面</button>
        </div>
      </form>
    </div>
@endsection