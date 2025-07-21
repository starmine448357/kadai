<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\CustomRegisterController;
use App\Http\Controllers\Auth\CustomLoginController;
use Illuminate\Support\Facades\Route;

// お問い合わせフォーム表示
Route::get('/', [ContactController::class, 'index'])->name('contact.index');

// 確認画面
Route::post('/contact/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

// 送信処理
Route::post('/contact/store', [ContactController::class, 'store'])->name('contact.store');

// サンクスページ
Route::get('/thanks', [ContactController::class, 'thanks'])->name('contact.thanks');

// カスタム認証ルート
Route::get('/register', [CustomRegisterController::class, 'create'])->name('register');
Route::post('/register', [CustomRegisterController::class, 'store']);
Route::get('/login', [CustomLoginController::class, 'create'])->name('login');
Route::post('/login', [CustomLoginController::class, 'store']);
Route::post('/logout', [CustomLoginController::class, 'destroy'])->name('logout');

// 管理画面（認証必須）
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [ContactController::class, 'adminIndex'])->name('admin.index');
    Route::get('/admin/contacts/{contact}', [ContactController::class, 'show'])->name('admin.contacts.show');
    Route::delete('/admin/contacts/{contact}', [ContactController::class, 'destroy'])->name('admin.contacts.destroy');
    Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
});
