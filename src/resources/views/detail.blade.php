@extends('layouts.app')

@section('content')

<h1>{{ $item->title }}</h1>
<img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" width="300">
<p>価格: ¥{{ $item->price }}</p>
<p>状態: {{ $item->condition }}</p>
<p>ブランド: {{ $item->brand }}</p>
<p>説明: {{ $item->description }}</p>
<p>カテゴリ:
@foreach($item->categories as $category)
    <span>{{ $category->name }}</span>
@endforeach
</p>

@foreach($item->comments as $comment)
    <div>
        <strong>{{ $comment->user->name }}</strong>:
        {{ $comment->body }}
    </div>
@endforeach

@auth
<form action="{{ url('/item/' . $item->id . '/comments') }}" method="POST">
    @csrf
    <textarea name="body" rows="4" cols="50" required></textarea>
    <button type="submit">コメントを投稿</button>
</form>
@endauth

@endsection