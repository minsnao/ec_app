@extends('layouts.app')

@php
    use Illuminate\Support\Str;
@endphp

@section('content')
@auth
<h2>あなたのプロフィール</h2>
<a href="{{ url('mypage/profile') }}"><button>プロフィール編集へ</button></a>
<br>
<p>{{ $user->name }}</p>
<img src="{{ asset('storage/' . $user->avatar) }}" alt="プロフィール画像" width="100">

<h2>出品一覧</h2>
<ul>
    @foreach ($itemsForSale as $item)
        <div>
            <a href="{{ url('/item/' . $item->id) }}">
                <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="150"  style="{{ $item->is_sold ? 'opacity: 0.5;' : '' }}">
                <h3>{{ $item->title }}</h3> 
            </a>          
            @if($item->is_sold) 
            <p>(Sold Out)</p>
            @endif
        </div>
    @endforeach
</ul>

<h2>購入一覧</h2>
<ul>
    @foreach ($purchasedItems as $item)
        <div>
            <a href="{{ url('/item/' . $item->id) }}">
                <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="150"  style="{{ $item->is_sold ? 'opacity: 0.5;' : '' }}">
                <h3>{{ $item->title }}</h3>
            </a>
        </div>
    @endforeach
</ul>
@endauth


@endsection