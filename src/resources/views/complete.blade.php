<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>お問い合わせ完了</title>
    <style>
        body { font-family: sans-serif; margin: 0; background-color: #f8f8f8; color: #333; display: flex; justify-content: center; align-items: center; min-height: 100vh; text-align: center; }
        .complete-container {
            max-width: 600px;
            padding: 40px;
            border: 1px solid #eee;
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0,0,0,0.05);
        }
        h1 {
            color: #5cb85c; /* フォームのボタンと同じ色 */
            margin-bottom: 20px;
        }
        p {
            font-size: 18px;
            line-height: 1.6;
            margin-bottom: 30px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff; /* 青系の色 */
            color: white;
            text-decoration: none;
            border-radius: 6px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="complete-container">
        <h1>お問い合わせありがとうございます！</h1>
        <p>お問い合わせ内容を送信いたしました。</p>
        <p>担当者より改めてご連絡させていただきますので、しばらくお待ちください。</p>
        <a href="{{ route('contact.create') }}">お問い合わせフォームに戻る</a>
    </div>
</body>
</html>