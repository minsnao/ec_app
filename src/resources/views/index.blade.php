@extends('layouts.app')

@section('content')

top

@auth
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">ログアウト</button>
</form>
<a href="{{ url('sell') }}"><button>出品</button></a>
@endauth

@guest
<div>
    <a href="{{ route('register') }}">会員登録はこちら</a>
</div>

<div>
    <a href="{{ route('login') }}">ログインはこちら</a>
</div>
@endguest

<h1>商品一覧</h1>
@foreach ($items as $item)
    <div>
        <a href="{{ url('/item/' . $item->id) }}">
            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="150">
            <td>{{ $item->title }} / </td>
            <td>¥{{ $item->price }}</td>
        </a>
    </div>
@endforeach

@endsection