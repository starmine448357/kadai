@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endsection

@section('content')
<div class="contact-container"> {{-- クラス名を変更 --}}
    <h1 class="contact-title">Contact</h1> {{-- クラス名を変更 --}}

    <form action="{{ route('contact.confirm') }}" method="POST"> {{-- class="contact-form" を削除 --}}
        @csrf

        <div class="form-grid-container"> {{-- 新しいグリッドコンテナを追加 --}}

            {{-- お名前 --}}
            <div class="form-group">
                <div class="label-column"> {{-- ラベルの列を追加 --}}
                    <label class="form-label">お名前<span class="required-mark">※</span></label> {{-- クラス名を変更 --}}
                </div>
                <div class="input-column"> {{-- 入力フィールドの列を追加 --}}
                    <div class="name-fields">
                        <div class="name-field-item"> {{-- 各入力フィールドをラップ --}}
                            <div class="field-wrapper"> {{-- エラーメッセージ用ラッパーを追加 --}}
                                <input type="text" name="last_names" class="form-input" placeholder="例：山田" value="{{ old('last_names') }}"> {{-- classを追加 --}}
                                @error('last_names')<div class="error-message">{{ $message }}</div>@enderror {{-- class名を変更 --}}
                            </div>
                        </div>
                        <div class="name-field-item">
                            <div class="field-wrapper">
                                <input type="text" name="first_names" class="form-input" placeholder="例：太郎" value="{{ old('first_names') }}">
                                @error('first_names')<div class="error-message">{{ $message }}</div>@enderror
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
                        <label class="gender-option"><input type="radio" name="genders" value="1" {{ old('genders', '1') == '1' ? 'checked' : '' }}> 男性</label> {{-- classを追加 --}}
                        <label class="gender-option"><input type="radio" name="genders" value="2" {{ old('genders') == '2' ? 'checked' : '' }}> 女性</label>
                        <label class="gender-option"><input type="radio" name="genders" value="3" {{ old('genders') == '3' ? 'checked' : '' }}> その他</label>
                    </div>
                    @error('genders')<div class="error-message">{{ $message }}</div>@enderror
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
                        @error('emails')<div class="error-message">{{ $message }}</div>@enderror
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
                        <div class="tel-part"> {{-- 各入力フィールドをラップ --}}
                            <div class="field-wrapper">
                                <input type="text" name="tel_parts1" class="form-input" placeholder="080" value="{{ old('tel_parts1') }}"> {{-- nameとclassを変更 --}}
                                @error('tel_parts1')<div class="error-message">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <span>-</span>
                        <div class="tel-part">
                            <div class="field-wrapper">
                                <input type="text" name="tel_parts2" class="form-input" placeholder="1234" value="{{ old('tel_parts2') }}"> {{-- nameとclassを変更 --}}
                                @error('tel_parts2')<div class="error-message">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <span>-</span>
                        <div class="tel-part">
                            <div class="field-wrapper">
                                <input type="text" name="tel_parts3" class="form-input" placeholder="5678" value="{{ old('tel_parts3') }}"> {{-- nameとclassを変更 --}}
                                @error('tel_parts3')<div class="error-message">{{ $message }}</div>@enderror
                            </div>
                        </div>
                    </div>
                    @error('tels')<div class="error-message">{{ $message }}</div>@enderror {{-- 結合されたtelsのエラーメッセージも残す --}}
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
                        @error('addresses')<div class="error-message">{{ $message }}</div>@enderror
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
                        @error('buildings')<div class="error-message">{{ $message }}</div>@enderror
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
                        <select name="category_ids" class="form-select"> {{-- nameとclassを変更 --}}
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_ids') == $category->id ? 'selected' : '' }}> {{-- nameをcategory_idsに合わせる --}}
                                    {{ $category->contents }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_ids')<div class="error-message">{{ $message }}</div>@enderror {{-- nameをcategory_idsに合わせる --}}
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
                        <textarea name="details" class="form-textarea" placeholder="お問い合わせ内容をご記載ください">{{ old('details') }}</textarea> {{-- classを追加 --}}
                        @error('details')<div class="error-message">{{ $message }}</div>@enderror
                    </div>
                </div>
            </div>

        </div> {{-- form-grid-container 終了 --}}

        <div class="text-center"> {{-- ボタンを中央に寄せるためのラッパー --}}
            <button type="submit" class="submit-button">確認画面</button> {{-- class名を変更 --}}
        </div>
    </form>
</div>
@endsection