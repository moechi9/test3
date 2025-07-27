<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PiGLy</title>
    <link rel="stylesheet" href="{{ asset('css/common1.css') }}">
    <link rel="stylesheet" href="{{asset('css/sanitize.css')}}">
    @yield('css')
</head>

<body>
    <div class="before-login__background">
        <div class="before-login__content">
            <div class="content-inner">
                <div class="content-item__title">
                    <div class="main-title">
                        <p class="main-title__utilities">PiGLy</p>
                    </div>
                    @yield('title')
                </div>
                @yield('content')
            </div>
        </div>
    </div>

</body>

</html>