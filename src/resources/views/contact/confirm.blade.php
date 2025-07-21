<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - 確認</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}">
</head>
<body>
    <header>
        <div class="header-content-wrapper">
            <h1 class="header-title">FashionablyLate</h1>
        </div>
    </header>

    <main>
        <div class="confirm-container">
            <h1 class="confirm-title">Confirm</h1>

            <form action="{{ route('contact.store') }}" method="POST">
                @csrf
                <table class="confirm-table">
                    <tr>
                        <th>お名前</th>
                        <td>{{ $contact['last_names'] }} {{ $contact['first_names'] }}</td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>{{ $contact['genders_text'] }}</td>
                    </tr>
                    <tr>
                        <th>メールアドレス</th>
                        <td>{{ $contact['emails'] }}</td>
                    </tr>
                    <tr>
                        <th>電話番号</th>
                        <td>{{ $contact['tels'] }}</td>
                    </tr>
                    <tr>
                        <th>住所</th>
                        <td>{{ $contact['addresses'] }}</td>
                    </tr>
                    <tr>
                        <th>建物名</th>
                        <td>{{ $contact['buildings'] }}</td>
                    </tr>
                    <tr>
                        <th>お問い合わせの種類</th>
                        <td>{{ $contact['category_name'] }}</td>
                    </tr>
                    <tr>
                        <th>お問い合わせ内容</th>
                        <td>{{ $contact['details'] }}</td>
                    </tr>
                </table>

                {{-- Hiddenで全データ送信 --}}
                <input type="hidden" name="last_names" value="{{ $contact['last_names'] }}">
                <input type="hidden" name="first_names" value="{{ $contact['first_names'] }}">
                <input type="hidden" name="genders" value="{{ $contact['genders'] }}">
                <input type="hidden" name="emails" value="{{ $contact['emails'] }}">

                {{-- telsは分割して送信 --}}
                <input type="hidden" name="tel1" value="{{ explode('-', $contact['tels'])[0] }}">
                <input type="hidden" name="tel2" value="{{ explode('-', $contact['tels'])[1] }}">
                <input type="hidden" name="tel3" value="{{ explode('-', $contact['tels'])[2] }}">

                <input type="hidden" name="addresses" value="{{ $contact['addresses'] }}">
                <input type="hidden" name="buildings" value="{{ $contact['buildings'] }}">
                <input type="hidden" name="category_id" value="{{ $contact['category_id'] }}">
                <input type="hidden" name="details" value="{{ $contact['details'] }}">

                <div class="confirm-buttons-horizontal">
                    <button type="submit" class="confirm-button submit-button">送信</button>
                    <button type="button" class="confirm-button back-button" onclick="history.back()">修正</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>
