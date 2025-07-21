<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inika:wght@400;700&display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <div class="app-container">
        <header>
            <div class="header-content-wrapper">
                <h1 class="header-title">FashionablyLate</h1>
                <nav class="header-nav">
                    @auth
                        <span>{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" class="header-auth-button">ログアウト</button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="header-auth-button">ログイン</a>
                        <a href="{{ route('register') }}" class="header-auth-button">会員登録</a>
                    @endauth
                </nav>
            </div>
        </header>

        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
