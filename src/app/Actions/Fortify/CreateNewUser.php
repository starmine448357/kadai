<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Fortify\Rules\Password;

class CreateNewUser implements CreatesNewUsers
{
    public function create(array $input): User
    {
        Validator::make($input, [
            'names' => ['required', 'string', 'max:255'],
            'emails' => ['required', 'string', 'email', 'max:255', 'unique:users,emails'],
            'passwords' => ['required', 'string', new Password, 'confirmed'],
        ], [
            'names.required' => 'お名前を入力してください',
            'emails.required' => 'メールアドレスを入力してください',
            'emails.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'emails.unique' => 'このメールアドレスは既に登録されています。',
            'passwords.required' => 'パスワードを入力してください',
            'passwords.confirmed' => 'パスワード（確認用）が一致しません。',
        ])->validate();

        return User::create([
            'names' => $input['names'],
            'emails' => $input['emails'],
            'passwords' => Hash::make($input['passwords']),
        ]);
    }
}