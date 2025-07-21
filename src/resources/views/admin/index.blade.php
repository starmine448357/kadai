<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }} - Contact</title>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inika&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">

    <style>
        body {
            background-color: #FFFFFF; /* 背景を白に変更 */
            font-family: 'Inter', sans-serif;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            margin: 0;
        }
        header {
            width: 100%;
            background-color: #fff;
            border-bottom: 1px solid #E0E0E0; /* ヘッダーの下に1pxの線を追加 */
            box-shadow: none; /* 影を削除 */
            padding: 20px 0;
            display: flex;
            justify-content: center;
            position: relative;
        }
        .header-content-wrapper {
            max-width: 700px;
            width: 100%;
            display: flex;
            justify-content: center; /* タイトルを中央に寄せる */
            align-items: center;
            padding: 0 50px;
            box-sizing: border-box;
        }
        .header-title {
            font-family: 'Inika', serif;
            font-size: 2.5rem;
            color: #8B7969;
            margin: 0;
            text-align: center;
            width: 100%;
        }
        main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <div class="header-content-wrapper">
            <h1 class="header-title">FashionablyLate</h1>
            <nav>
                {{-- お問い合わせページにはログイン/登録ボタンは通常不要 --}}
            </nav>
        </div>
    </header>

    <main>
        <div class="contact-container">
            <h1 class="contact-title">Contact</h1>
            <form action="{{ route('contact.confirm') }}" method="POST">
                @csrf

                {{-- フォームのグリッドコンテナ --}}
                <div class="form-grid-container">

                    {{-- お名前 --}}
                    <div class="form-group">
                        <div class="label-column">
                            <label class="form-label">お名前<span class="required-mark">※</span></label>
                        </div>
                        <div class="input-column">
                            <div class="name-fields">
                                <div class="name-field-item">
                                    <div class="field-wrapper">
                                        <input type="text" name="last_names" class="form-input" placeholder="例：山田" value="{{ old('last_names') }}">
                                        @error('last_names')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="name-field-item">
                                    <div class="field-wrapper">
                                        <input type="text" name="first_names" class="form-input" placeholder="例：太郎" value="{{ old('first_names') }}">
                                        @error('first_names')
                                            <div class="error-message">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- 性別 --}}
                    <div class="form-group">
                        <div class="label-column">
                            <label class="form-label">性別<span class="required-mark">※</span></label>
                        </div>
                        <div class="input-column">
                            <div class="gender-options">
                                <label class="gender-option">
                                    <input type="radio" name="genders" value="1" {{ old('genders', '1') == '1' ? 'checked' : '' }}> 男性
                                </label>
                                <label class="gender-option">
                                    <input type="radio" name="genders" value="2" {{ old('genders') == '2' ? 'checked' : '' }}> 女性
                                </label>
                                <label class="gender-option">
                                    <input type="radio" name="genders" value="3" {{ old('genders') == '3' ? 'checked' : '' }}> その他
                                </label>
                            </div>
                            @error('genders')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- メールアドレス --}}
                    <div class="form-group">
                        <div class="label-column">
                            <label class="form-label">メールアドレス<span class="required-mark">※</span></label>
                        </div>
                        <div class="input-column">
                            <div class="field-wrapper">
                                <input type="email" name="emails" class="form-input" placeholder="例：test@example.com" value="{{ old('emails') }}">
                                @error('emails')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- 電話番号 --}}
                    <div class="form-group">
                        <div class="label-column">
                            <label class="form-label">電話番号<span class="required-mark">※</span></label>
                        </div>
                        <div class="input-column">
                            <div class="tel-fields">
                                <div class="tel-part">
                                    <div class="field-wrapper">
                                        <input type="text" name="tel_parts1" class="form-input" placeholder="080" value="{{ old('tel_parts1') }}">
                                    </div>
                                </div>
                                <span>-</span>
                                <div class="tel-part">
                                    <div class="field-wrapper">
                                        <input type="text" name="tel_parts2" class="form-input" placeholder="1234" value="{{ old('tel_parts2') }}">
                                    </div>
                                </div>
                                <span>-</span>
                                <div class="tel-part">
                                    <div class="field-wrapper">
                                        <input type="text" name="tel_parts3" class="form-input" placeholder="5678" value="{{ old('tel_parts3') }}">
                                    </div>
                                </div>
                            </div>
                            {{-- 電話番号全体のエラーメッセージはtel-fieldsの下に配置 --}}
                            @error('tels')
                                <div class="error-message">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    {{-- 住所 --}}
                    <div class="form-group">
                        <div class="label-column">
                            <label class="form-label">住所<span class="required-mark">※</span></label>
                        </div>
                        <div class="input-column">
                            <div class="field-wrapper">
                                <input type="text" name="addresses" class="form-input" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('addresses') }}">
                                @error('addresses')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- 建物名 --}}
                    <div class="form-group">
                        <div class="label-column">
                            <label class="form-label">建物名</label>
                        </div>
                        <div class="input-column">
                            <div class="field-wrapper">
                                <input type="text" name="buildings" class="form-input" placeholder="例：千駄ヶ谷マンション101" value="{{ old('buildings') }}">
                                @error('buildings')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- お問い合わせの種類 --}}
                    <div class="form-group">
                        <div class="label-column">
                            <label class="form-label">お問い合わせの種類<span class="required-mark">※</span></label>
                        </div>
                        <div class="input-column">
                            <div class="field-wrapper">
                                <select name="category_ids" class="form-select">
                                    <option value="">選択してください</option>
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ old('category_ids') == $category->id ? 'selected' : '' }}>
                                            {{ $category->contents }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_ids')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- お問い合わせ内容 --}}
                    <div class="form-group">
                        <div class="label-column">
                            <label class="form-label">お問い合わせ内容<span class="required-mark">※</span></label>
                        </div>
                        <div class="input-column">
                            <div class="field-wrapper">
                                <textarea name="details" class="form-textarea" placeholder="お問い合わせ内容をご記載ください">{{ old('details') }}</textarea>
                                @error('details')
                                    <div class="error-message">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                </div> {{-- form-grid-container 終了 --}}

                <div class="text-center">
                    <button type="submit" class="submit-button">確認画面</button>
                </div>
            </form>
        </div>
    </main>
</body>
</html>