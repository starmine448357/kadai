@extends('layouts.app')

@section('header', '')

@push('styles')
<style>
body {
    background-color: #f8f8f8;
    margin: 0;
    overflow: hidden;
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
}
.thanks-background-text {
    position: fixed; /* absolute から fixed に変更 */
    font-family: 'Inika', serif;
    font-size: 200px;
    color: #e8e5e0;
    opacity: 0.8;
    text-align: center;
    /* width: 100%; ← 削除 */
    top: 50%;
    left: 50%; /* 左端から50%の位置に移動 */
    transform: translate(-50%, -50%); /* 自身の幅と高さの半分だけ戻して中央寄せ */
    z-index: 0;
    pointer-events: none;
    white-space: nowrap; /* テキストが改行されないように */
}

.thanks-container {
    text-align: center;
    background-color: transparent;
    box-shadow: none;
    border-radius: 0;
    width: auto;
    max-width: none;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    min-height: auto;
    padding: 50px;
    position: relative;
    z-index: 1;
}

.thanks-message {
    font-family: 'Inika', serif;
    font-size: 1.8rem;
    font-weight: 400;
    color: #8B7A6C;
    margin-bottom: 10px;
}

.thanks-sub-message {
    font-size: 0.9rem;
    color: #8B7A6C;
    margin-bottom: 30px;
}

.home-button {
    display: inline-block;
    background-color: #8B7A6C;
    color: #fff;
    padding: 8px 25px;
    border: none;
    border-radius: 4px;
    font-size: 1rem;
    font-weight: normal;
    cursor: pointer;
    transition: background-color 0.2s ease-in-out;
    text-decoration: none;
    width: 150px;
}

.home-button:hover {
    background-color: #7a6b5e;
}
</style>
@endpush

@section('content')
<div class="thanks-background-text">Thank you</div>
<div class="thanks-container">
    <p class="thanks-message">お問い合わせありがとうございました</p>
    <a href="/" class="home-button">HOME</a>
</div>
@endsection
