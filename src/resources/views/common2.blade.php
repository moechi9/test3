<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/common2.css') }}">
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header-utilities">
                <p class="header__logo">PiGLy</p>
            </div>
            @if (Auth::check())
            <div class="header-button">
                <form action="/weight_logs/goal_setting" class="setting" method="get">
                    @csrf
                    <button class="setting__button">目標体重設定</button>
                </form>
                <form action="/logout" class="logout" method="post">
                    @csrf
                    <button class="logout__button">ログアウト</button>
                </form>
            </div>
            @endif
        </div>
    </header>

    <main>
        <div class="management-list__background">
            @yield('content')
        </div>
    </main>

</body>

</html>