@extends('layouts.app')

@section('content')

<h2>ログインページ</h2>

<form method="POST" action="{{ route('login') }}">
    @csrf
    <div>
        <label for="email">メールアドレス</label>
        <input type="email" name="email" required>
    </div>
    <div>
        <label for="password">パスワード</label>
        <input type="password" name="password" required>
    </div>
    <div>
        <button type="submit">ログインする</button>
    </div>
</form>

<div>
    <a href="{{ route('register') }}">会員登録はこちら</a>
</div>

@endsection