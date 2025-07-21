<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Thanks</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/thanks.css') }}">

</head>
<body>
    {{-- ヘッダーを削除 --}}

    <main>
        <div class="background-text">Thank you</div>
        <div class="thanks-container">
            <p class="thanks-message">お問い合わせありがとうございました</p>
            <form action="{{ route('contact.index') }}" method="GET">
                <button type="submit" class="home-button">HOME</button>
            </form>
        </div>
    </main>
</body>
</html>