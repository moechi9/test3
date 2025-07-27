@extends('auth/common1')
@section('css')
<link rel="stylesheet" href="{{asset('css/register2.css')}}">
@endsection

@section('title')
<div class="sub-title1">
    <p class="sub-title_item1">新規会員登録</p>
</div>
<div class="sub-title2">
    <p class="sub-title_item2">STEP2体重データの入力</p>
</div>
@endsection

@section('content')
<form action="/weight_log" class="content__form" method="post">
    @csrf
    <div class="content-item__input">
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">現在の体重</span>
            </div>
            <div class="form__group-content">
                <input type="text" name="weight" class="form__input--text" placeholder="現在の体重を入力" value="{{old('weight')}}" />
                <div class="form__error">
                    @error('weight')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
        <div class="form__group">
            <div class="form__group-title">
                <span class="form__label--item">目標の体重</span>
            </div>
            <div class="form__group-content">
                <input type="text" class="form__input--text" name="target_weight" placeholder="目標の体重を入力" value="{{old('target_weight')}}" />
                <div class="form__error">
                    @error('target_weight')
                    {{$message}}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="content-item__button">
        <button class="button__next">アカウント作成</button>
    </div>
</form>
@endsection