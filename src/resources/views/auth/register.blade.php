<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>FashionablyLate - Register</title>

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
                <a href="{{ route('login') }}" class="header-auth-button">login</a>
            </nav>
        </div>
    </header>

    <main>
        <h2 class="page-title">Register</h2>
        <div class="auth-card">
            <form method="POST" action="{{ route('register') }}">
                @csrf

                <label for="name">お名前</label>
                <input id="name" type="text" name="name" placeholder="例: 山田 太郎" value="{{ old('name') }}">
                @error('name')
                    <div class="error-messages">{{ $message }}</div>
                @enderror

                <label for="email">メールアドレス</label>
                <input id="email" type="text" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                @error('email')
                    <div class="error-messages">{{ $message }}</div>
                @enderror

                <label for="password">パスワード</label>
                <input id="password" type="password" name="password" placeholder="例: coachtech1106">
                @error('password')
                    <div class="error-messages">{{ $message }}</div>
                @enderror

                <button type="submit">登録</button>
            </form>
        </div>
    </main>
</body>
</html>
