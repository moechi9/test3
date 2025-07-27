@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/goal_setting.css')}}">
@endsection

@section('content')
<div class="detail-content">
    <div class="detail-content_item">
        <form class="target-form" action="/weight_logs/goal_update" method="post">
            @method('patch')
            @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">目標体重設定</span>
                </div>
                @foreach($weight_targets as $weight_target)
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" class="form__input--item_unit" name="weight" value="{{$weight_target['target_weight']}}" />
                        <span class="form__span--item">kg</span>
                    </div>
                    <div class="form__error">
                        @error('target_weight')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                @endforeach
            </div>
            <div class="target-button">
                <div class="target-button__back">
                    <button class="back" type="button" onclick="history.back(-1)">戻る</button>
                </div>
                <div class="target-button__submit">
                    <button class="update" type="submit">更新</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection