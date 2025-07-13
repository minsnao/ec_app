@extends('layouts.app')

@section('content')

<div>
    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}">
    <div>
        <h2>{{ $item->title }}</h2>
        <p>￥{{ number_format($item->price) }}</p>
    </div>
</div>
<p>----------------------------------</p>
<div>
    <h2>支払い方法</h2>
    <select name="payment">
        <option value="" select hidden>支払い方法を選択してください</option>
        <option value="credit">クレジットカード</option>
        <option value="convenience">コンビニ支払い</option>
    </select>
</div>
<p>----------------------------------</p>
<div>
    <h2>配送先</h2>
    <p>{{ Auth::user()->address }}</p>
    <p>{{ Auth::user()->building }}</p>
    <a href="{{ url('purchase/address/' . $item->id) }}">配送先を変更する</a>
</div>
<form action="{{ url('/purchase/' . $item->id) }}" method="POST">
    @csrf
    <button type="submit">
        購入する
    </button>
</form>
@endsection