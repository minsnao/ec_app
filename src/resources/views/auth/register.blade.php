@extends('layouts.app')

@section('content')

<h2>会員登録ページページ</h2>

<form method="POST" action="{{ route('register') }}">
    @csrf
    <div>
        <label for="name">ユーザー名</label>
        <input type="text" name="name" required>
    </div>
    <div>
        <label for="email">メールアドレス</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="password">パスワード</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <label for="password">確認パスワード</label>
        <input type="password" name="password_confirmation" required>
    </div>
    <div>
        <button type="submit">登録する</button>
    </div>
</form>

<div>
    <a href="{{ route('login') }}">ログインはこちら</a>
</div>

@endsection