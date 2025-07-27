@extends('common2')
@section('css')
<link rel="stylesheet" href="{{asset('css/weight_logs.css')}}">
@endsection

@section('content')
<div class="management-list__content">
    <div class="content__header">
        @foreach($weight_targets as $weight_target)
        <div class="weight_content">
            <div class="weight-title">
                <span class="weight-title_item">目標体重</span>
            </div>
            <div class="weight-inner">
                <p class="weight-inner_item">{{$weight_target['target_weight']}}<span class="kg">kg</span></p>
            </div>
        </div>
        <div class="border"></div>
        <div class="weight_content">
            <div class="weight-title">
                <span class="weight-title_item">目標まで</span>
            </div>
            <div class="weight-inner">
                <p class="weight-inner_item">{{$weight_target['target_weight']-$latest_weight_log['weight']}}<span class="kg">kg</span></p>
            </div>
        </div>
        <div class="border"></div>
        <div class="weight_content">
            <div class="weight-title">
                <span class="weight-title_item">最新体重</span>
            </div>
            <div class="weight-inner">
                <p class="weight-inner_item">{{$latest_weight_log['weight']}}<span class="kg">kg</span></p>
            </div>
        </div>
        @endforeach
    </div>
    <div class="content__main">
        <div class="content__search-create">
            <div>
                <form class="search-form" action="">
                    @csrf
                    <input class="date" type="date" name="from" placeholder="from_date" value="">
                    <span class="mx-3">~</span>
                    <input class="date" type="date" name="until" placeholder="until_date" value="">
                    <button class="search-button">検索</button>
                    <!-- リセットボタン（検索後のみ） -->
                    <!-- 期間と件数（検索後のみ） -->
                </form>
            </div>
            <div class="create-button">
                <a class="create-button_item" href="#/create">データ追加</a>
            </div>
        </div>


        <div class="modal" id="/create">
            <a href="#!" class="modal-overlay"></a>
            <div class="modal__inner">
                <div class="modal__content">
                    <div class="modal__create-title">
                        <p class="modal__create-title_item">Weight Logを追加</p>
                    </div>
                    <form class="modal__create-form" action="/weight_logs" method="post">
                        @csrf
                        <div class="create-form__group">
                            <div class="create-form__group-title">
                                <span class="create-form__label--item">日付</span>
                                <span class="create-form__label--required">必須</span>
                            </div>
                            <div class="create-form__group-content">
                                <div class="create-form__input--text">
                                    <input type="date" class="form__input--item" name="date" placeholder="年/月/日" />
                                </div>
                                <div class="form__error">
                                    @error('date')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="create-form__group">
                            <div class="create-form__group-title">
                                <span class="create-form__label--item">体重</span>
                                <span class="create-form__label--required">必須</span>
                            </div>
                            <div class="create-form__group-content">
                                <div class="create-form__input--text">
                                    <input type="text" class="form__input--item_unit" name="weight" placeholder="50.0" />
                                    <span class="form__span--item">kg</span>
                                </div>
                                <div class="form__error">
                                    @error('weight')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="create-form__group">
                            <div class="create-form__group-title">
                                <span class="create-form__label--item">摂取カロリー</span>
                                <span class="create-form__label--required">必須</span>
                            </div>
                            <div class="create-form__group-content">
                                <div class="create-form__input--text">
                                    <input type="text" class="form__input--item_unit" name="calories" placeholder="1200" />
                                    <span class="form__span--item">cal</span>
                                </div>
                                <div class="form__error">
                                    @error('calories')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="create-form__group">
                            <div class="create-form__group-title">
                                <span class="create-form__label--item">運動時間</span>
                                <span class="create-form__label--required">必須</span>
                            </div>
                            <div class="create-form__group-content">
                                <div class="create-form__input--text">
                                    <input type="text" class="form__input--item" name="exercise_time" placeholder="00:00" />
                                </div>
                                <div class="form__error">
                                    @error('exercise_time')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="create-form__group">
                            <div class="create-form__group-title">
                                <span class="create-form__label--item">運動内容</span>
                            </div>
                            <div class="create-form__group-content">
                                <div class="create-form__input--text">
                                    <textarea type="text" class="form__input--item_text" name="exercise_content" placeholder="運動内容を追加"></textarea>
                                </div>
                                <div class="form__error">
                                    @error('exercise_content')
                                    {{ $message }}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="modal_create-button">
                            <div class="create-button__back">
                                <button class="back" type="button" onclick="history.back(-1)">戻る</button>
                            </div>
                            <div class="create-button__submit">
                                <button class="create" type="submit">登録</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <div class="weight_log-table">
            <table class="weight_log-table__inner">
                <tr class="weight_log-table__row">
                    <th class="weight_log-table__header">
                        <div class="weight_log-table__header-span">日付</div>
                    </th>
                    <th class="weight_log-table__header">
                        <div class="weight_log-table__header-span">体重</div>
                    </th>
                    <th class="weight_log-table__header">
                        <div class="weight_log-table__header-span">食事摂取カロリー</div>
                    </th>
                    <th class="weight_log-table__header">
                        <div class="weight_log-table__header-span">運動時間</div>
                    </th>
                    <th class="weight_log-table__header">
                        <div class="weight_log-table__header-span"></div>
                    </th>
                </tr>
                @foreach($weight_logs as $weight_log)
                <tr class="weight_log-table__row">
                    <td class="weight_log-table__item">
                        <div class="weight_log-list__item">
                            <p class="weight_log-list__item-p">{{$weight_log['date']->format('Y/m/d')}}</p>
                            <input type="hidden" name="id" value="{{$weight_log['id']}}">
                        </div>
                    </td>
                    <td class="weight_log-table__item">
                        <div class="weight_log-list__item">
                            <p class="weight_log-list__item-p">{{$weight_log['weight']}}kg</p>
                            <input type="hidden" name="id" value="{{$weight_log['id']}}">
                        </div>
                    </td>
                    <td class="weight_log-table__item">
                        <div class="weight_log-list__item">
                            <p class="weight_log-list__item-p">{{$weight_log['calories']}}cal</p>
                            <input type="hidden" name="id" value="{{$weight_log['id']}}">
                        </div>
                    </td>
                    <td class="weight_log-table__item">
                        <div class="weight_log-list__item">
                            <p class="weight_log-list__item-p">{{$weight_log['exercise_time']->format("H:i")}}</p>
                            <input type="hidden" name="id" value="{{$weight_log['id']}}">
                        </div>
                    </td>
                    <td class="weight_log-table__item">
                        <div class="weight_log-list__item">
                            <a class="weight_log-list__item-p" href="{{route('weight_log.weightLogId',['weightLogId'=>$weight_log['id']])}}">
                                icon
                            </a>
                            <input type="hidden" name="id" value="{{$weight_log['id']}}">
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="weight_log-page">
            {{ $weight_logs->appends(request()->query())->links('vendor.pagination.semantic-ui') }}
        </div>
    </div>
</div>
@endsection