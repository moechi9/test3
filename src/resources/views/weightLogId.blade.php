@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/weightLogId.css')}}">
@endsection

@section('content')
<div class="detail-content">
    <div class="detail-content_item">
        <div class="detail-title">
            <p class="detail-title_item">Weight Log</p>
        </div>
        <form class="detail-form" action="{{route('weight_log.weightLogId.update',['weightLogId'=>$weight_log['id']])}}" method="post">
            @method('patch')
            @csrf
            <div class=" form__group">
                <div class="form__group-title">
                    <span class="form__label--item">日付</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="date" class="form__input--item" name="date" value="{{$dt->format('Y/m/d')}}" />
                        <input type="hidden" name="id" value="{{$weight_log['id']}}">
                    </div>
                    <div class="form__error">
                        @error('date')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">体重</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" class="form__input--item_unit" name="weight" value="{{$weight_log['weight']}}" />
                        <input type="hidden" name="id" value="{{$weight_log['id']}}">
                        <span class="form__span--item">kg</span>
                    </div>
                    <div class="form__error">
                        @error('weight')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">摂取カロリー</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" class="form__input--item_unit" name="calories" value="{{$weight_log['calories']}}" />
                        <input type="hidden" name="id" value="{{$weight_log['id']}}">
                        <span class="form__span--item">cal</span>
                    </div>
                    <div class="form__error">
                        @error('calories')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">運動時間</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" class="form__input--item" name="exercise_time" value="{{$weight_log['exercise_time']->format("H:i")}}" />
                        <input type="hidden" name="id" value="{{$weight_log['id']}}">
                    </div>
                    <div class="form__error">
                        @error('exercise_time')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">運動内容</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <textarea class="form__input--item_text" name="exercise_content" value="{{$weight_log['exercise_content']}}" placeholder="運動内容を追加"></textarea>
                        <input type="hidden" name="id" value="{{$weight_log['id']}}">
                    </div>
                    <div class="form__error">
                        @error('exercise_content')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="detail-button">
                <div class="detail-button__back">
                    <button class="back" type="button" onclick="history.back(-1)">戻る</button>
                </div>
                <div class="detail-button__submit">
                    <button class="update" type="submit">更新</button>
                </div>
            </div>
        </form>
        <form class="delete-form">
            @method('delete')
            @csrf
            <div class=" detail-button__delete">
                <button class="delete" type="delete">
                    <img class="delete_icon" src="{{asset('../../storage/app/public/icon.png')}}">
                    <input type="hidden" name="" value="">
                </button>
            </div>
        </form>
    </div>
</div>
@endsection