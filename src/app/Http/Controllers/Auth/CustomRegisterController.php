<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class CustomRegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        // バリデーションルール
        $validatedData = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:0'],
        ], [
            'name.required' => 'お名前を入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスは「ユーザー名@ドメイン」形式で入力してください',
            'password.required' => 'パスワードを入力してください',
        ]);

        // バリデーション済みのデータを使用してユーザーを作成
        $user = User::create([
            'name' => $validatedData['name'], // バリデーション済みのnameを使用
            'email' => $validatedData['email'], // バリデーション済みのemailを使用
            'password' => Hash::make($validatedData['password']), // バリデーション済みのpasswordを使用
        ]);

        Auth::login($user);

        return redirect('/admin');
    }
}