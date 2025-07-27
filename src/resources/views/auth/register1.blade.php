@extends('auth/common1')
@section('css')
<link rel="stylesheet" href="{{asset('css/register1.css')}}">
@endsection

@section('title')
<div class="sub-title1">
    <p class="sub-title_item1">新規会員登録</p>
</div>
<div class="sub-title2">
    <p class="sub-title_item2">STEP1アカウント情報の登録</p>
</div>
@endsection

@section('content')
<form action="/register" class="content__form" method="post">
    @csrf
    <div class="content-item__input">
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">お名前</span>
            </div>
            <div class="form__group-content">
                <input type=" text" class="form__input--text" name="name" placeholder="名前を入力" value="{{old('name')}}" />
                <div class="form__error">
                    @error('name')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">メールアドレス</span>
            </div>
            <div class="form__group-content">
                <input type="text" class="form__input--text" name="email" placeholder="メールアドレスを入力" value="{{old('email')}}" />
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
                <input type="text" name="password" class="form__input--text" placeholder=" パスワードを入力" value="{{old('password')}}" />
                <div class="form__error">
                    @error('password')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="content-item__button">
        <button class="button__next">次に進む</button>
    </div>
</form>
<div class="content-item__button">
    <a href="/login" class="button__login-page">ログインはこちら</a>
</div>
@endsection