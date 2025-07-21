<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ詳細 - 管理画面</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-2xl font-bold mb-6 text-center">お問い合わせ詳細</h1>

        <div class="mb-4">
            <p class="font-semibold">氏名:</p>
            <p class="ml-4">{{ $contact->last_names }} {{ $contact->first_names }}</p>
        </div>

        <div class="mb-4">
            <p class="font-semibold">性別:</p>
            <p class="ml-4">
                @if($contact->genders === 1)
                    男性
                @elseif($contact->genders === 2)
                    女性
                @else
                    その他
                @endif
            </p>
        </div>

        <div class="mb-4">
            <p class="font-semibold">メールアドレス:</p>
            <p class="ml-4">{{ $contact->emails }}</p>
        </div>

        <div class="mb-4">
            <p class="font-semibold">電話番号:</p>
            <p class="ml-4">{{ $contact->tels }}</p>
        </div>

        <div class="mb-4">
            <p class="font-semibold">住所:</p>
            <p class="ml-4">{{ $contact->addresses }}</p>
        </div>

        <div class="mb-4">
            <p class="font-semibold">建物名:</p>
            <p class="ml-4">{{ $contact->buildings ?? 'なし' }}</p>
        </div>

        <div class="mb-4">
            <p class="font-semibold">お問い合わせ種別:</p>
            <p class="ml-4">{{ $contact->category->contents ?? 'カテゴリ不明' }}</p>
        </div>

        <div class="mb-6">
            <p class="font-semibold">お問い合わせ内容:</p>
            <p class="ml-4 whitespace-pre-wrap">{{ $contact->details }}</p>
        </div>

        <div class="text-center">
            <a href="{{ route('admin.index') }}" class="inline-block bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                一覧に戻る
            </a>
        </div>
    </div>
</body>
</html>