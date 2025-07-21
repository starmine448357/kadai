<?php

namespace App\Http\Controllers;

use App\Models\User; // Userモデルをインポート
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * ユーザー一覧を表示する
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $perPage = 10; // 1ページあたりの表示件数

        // Userモデルから全てのユーザーを取得し、ページネーションを適用
        // 必要であれば検索条件などを追加できます
        $users = User::paginate($perPage);

        return view('users.index', compact('users'));
    }

    /**
     * 特定のユーザー詳細を表示する（必要であれば）
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\View\View
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }

    // 必要であれば、ユーザーの編集、削除などのメソッドを追加
}