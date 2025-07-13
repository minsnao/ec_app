@extends('layouts.app')

@section('content')

<div>
    <h1>{{ $item->title }}</h1>
    <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" width="300"><br>
    @auth
    <form method="POST"  action="/item/{{ $item->id }}/like" style="display: inline;">
        @csrf
        <button type="submit" style="background: none; border: none; cursor: pointer;">
        {{ auth()->user()->likedItems->contains($item->id) ? '❤️' : '🤍' }}
        </button>
        <p>いいね数: {{ $item->likedItems->count() }}</p>
    </form>
    @endauth    
    <p>価格: ¥{{ $item->price }}</p>
    <p>状態: {{ $item->condition }}</p>
    <p>ブランド: {{ $item->brand }}</p>
    <p>説明: {{ $item->description }}</p>
    <p>カテゴリ:
    @foreach($item->categories as $category)
        <span>{{ $category->name }}</span>
    @endforeach
    </p>  
</div>


@foreach($item->comments as $comment)
    <div>
        <strong>{{ $comment->user->name }}</strong>:
        {{ $comment->body }}
    </div>
@endforeach

@auth
<form action="{{ url('/item/' . $item->id . '/comments') }}" method="POST">
    @if (! $item->is_sold)
    @csrf
    <textarea name="body" rows="4" cols="50" required></textarea>
    <button type="submit">コメントを投稿</button>
    @endif
</form>
@endauth

<div>
    @if ($item->is_sold)
    <p class="text-red-500 font-bold">Sold Out</p>
    @else
    <a href="{{ url('/purchase/' . $item->id) }}">
        <button>購入する</button>
    </a> 
    @endif
</div>


@endsection