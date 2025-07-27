@extends('auth/common1')
@section('css')
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection

@section('title')
<div class="sub-title">
    <p class="sub-title_item">ログイン</p>
</div>
@endsection

@section('content')
<form action="/login" class="content__form" method="post">
    @csrf
    <div class="content-item__input">
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <input type="text" name="email" class="form__input--text" placeholder="メールアドレスを入力" value="{{old('email')}}" />
                <div class="form__error">
                    @error('email')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">パスワード</span>
            </div>
            <div class="form__group-content">
                <input type="text" class="form__input--text" name="password" placeholder="パスワードを入力" value="{{old('password')}}" />
                <div class="form__error">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="content-item__button">
        <button class="button__next">ログイン</button>
    </div>
</form>
<div class="content-item__button">
    <a href="/register/step1" class="button__register-page">アカウント作成はこちら</a>
</div>
@endsection