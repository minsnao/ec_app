<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>フリマアプリ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/form.css') }}">
    <link rel="stylesheet" href="{{ asset('css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    @yield('css')
</head>

<body>
    <header class="header">
        <div class="header__inner">
            <div class="header__left">
                <a class="header__logo" href="/">
                <img src="{{ asset('images/logo.svg') }}" alt="ロゴ" class="logo-img">
                </a>
            </div>
            <div class="header__center">
                @if (!request()->is('login', 'register'))
                <form method="GET" action="/">
                    <input type="text" name="keyword" placeholder="なにをお探しですか？" value="{{ request('keyword') }}">
                </form>
                @endif
            </div>
            <div class="header__right">
                @if (!request()->is('login', 'register'))                
                @auth
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit">ログアウト</button>
                    
                </form>
                <a href="{{ url('mypage') }}"><button>マイページ</button></a>
                @endauth
                @guest
                <div>
                    <a href="{{ route('login') }}"><button>ログイン</button></a>
                    <a href="{{ url('mypage') }}"><button>マイページ</button></a>
                </div>
                @endguest
                <a href="{{ url('sell') }}"><button>出品</button></a>
                @endif
            </div>
        </div>
    </header>


    <main>
        @yield('content')
    </main>
</body>
</html>


