<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FashionablyLate - Login</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/auth.css') }}">
</head>
<body>
    <header>
        <div class="header-content-wrapper">
            <h1 class="header-title">FashionablyLate</h1>
            <nav>
                <a href="{{ route('register') }}" class="header-auth-button">Register</a>
            </nav>
        </div>
    </header>

    <main>
        <h2 class="page-title">Login</h2>
        <div class="auth-card">
            {{-- セッションステータス --}}
            @if (session('status'))
                <div style="color: green; margin-bottom: 1rem;">
                    {{ session('status') }}
                </div>
            @endif

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <label for="email">メールアドレス</label>
                <input id="email" type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}" autofocus>
                @error('email')
                    <div class="error-messages">{{ $message }}</div>
                @enderror

                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" placeholder="例: coachtech1106">
                @error('password')
                    <div class="error-messages">{{ $message }}</div>
                @enderror

                <div class="flex">

                    <button type="submit">ログイン</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
