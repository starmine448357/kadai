@extends('layouts.app')

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/contact.css') }}">
@endpush

@section('content')
<div class="contact-container">
    <h1 class="contact-title">Contact</h1>
    <form action="{{ route('contact.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label class="form-label">お名前<span class="required-mark">※</span></label>
            <div class="form-input-group">
                <div class="name-fields">
                    <div class="name-field-item">
                        <input type="text" name="last_names" class="form-input" placeholder="例：山田" value="{{ old('last_names') }}">
                        @error('last_names')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="name-field-item">
                        <input type="text" name="first_names" class="form-input" placeholder="例：太郎" value="{{ old('first_names') }}">
                        @error('first_names')
                            <div class="error-message">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">性別<span class="required-mark">※</span></label>
            <div class="form-input-group">
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

        <div class="form-group">
            <label class="form-label">メールアドレス<span class="required-mark">※</span></label>
            <div class="form-input-group">
                <input type="email" name="emails" class="form-input" placeholder="例：test@example.com" value="{{ old('emails') }}">
                @error('emails')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">電話番号<span class="required-mark">※</span></label>
            <div class="form-input-group">
                <div class="tel-fields">
                    <input type="text" name="tel_parts1" class="form-input tel-part" placeholder="080" value="{{ old('tel_parts1') }}">
                    <span>-</span>
                    <input type="text" name="tel_parts2" class="form-input tel-part" placeholder="1234" value="{{ old('tel_parts2') }}">
                    <span>-</span>
                    <input type="text" name="tel_parts3" class="form-input tel-part" placeholder="5678" value="{{ old('tel_parts3') }}">
                </div>
                @php
                    $telErrors = [];
                    if ($errors->has('tel_parts1')) {
                        $telErrors[] = $errors->first('tel_parts1');
                    }
                    if ($errors->has('tel_parts2')) {
                        $telErrors[] = $errors->first('tel_parts2');
                    }
                    if ($errors->has('tel_parts3')) {
                        $telErrors[] = $errors->first('tel_parts3');
                    }
                @endphp
                @if (!empty($telErrors))
                    <div class="error-message">
                        @foreach (array_unique($telErrors) as $error)
                            {{ $error }}<br>
                        @endforeach
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">住所<span class="required-mark">※</span></label>
            <div class="form-input-group">
                <input type="text" name="addresses" class="form-input" placeholder="例：東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('addresses') }}">
                @error('addresses')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">建物名</label>
            <div class="form-input-group">
                <input type="text" name="buildings" class="form-input" placeholder="例：千駄ヶ谷マンション101" value="{{ old('buildings') }}">
                @error('buildings')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">お問い合わせの種類<span class="required-mark">※</span></label>
            <div class="form-input-group">
                <div class="select-wrapper">
                    <select name="category_ids" class="form-select">
                        <option value="">選択してください</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_ids') == $category->id ? 'selected' : '' }}>
                                {{ $category->contents }}
                            </option>
                        @endforeach
                    </select>
                </div>
                @error('category_ids')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">お問い合わせ内容<span class="required-mark">※</span></label>
            <div class="form-input-group">
                <textarea name="details" class="form-textarea" placeholder="お問い合わせ内容をご記載ください">{{ old('details') }}</textarea>
                @error('details')
                    <div class="error-message">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="submit-button">確認画面</button>
        </div>
    </form>
</div>
@endsection