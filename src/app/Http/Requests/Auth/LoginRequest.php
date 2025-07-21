<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;

class LoginRequest extends FormRequest
{
    /**
     * リクエストが認証されているか判定
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * バリデーションルールを定義
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => ['required', 'string', 'email'], // メールアドレスは必須、メール形式
            'password' => ['required', 'string'], // パスワードは必須
        ];
    }

    /**
     * カスタムバリデーションメッセージを定義
     *
     * @return array
     */
    public function messages(): array
    {
        return [
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
        ];
    }

    // authenticate() メソッドは、このカスタムバリデーションメッセージの目的では不要です。
    // Fortifyが認証処理を担当するため、ここには残しません。
    // もしFortifyのデフォルトの認証動作を完全に上書きしたい場合は必要になりますが、
    // 今回の目的はバリデーションメッセージのカスタマイズなので、シンプルさを保ちます。
    // public function authenticate(): void
    // {
    // }
}

