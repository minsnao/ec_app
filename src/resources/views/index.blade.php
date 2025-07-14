@extends('layouts.app')
@section('content')

@php
    use Illuminate\Support\Str;
@endphp

<script>
    const isAuthenticated = {{ auth()->check() ? 'true' : 'false' }};
    document.addEventListener('DOMContentLoaded', function () {
        const buttons = document.querySelectorAll('.tab__btn');
        const contents = document.querySelectorAll('.tab__content');

        buttons.forEach(button => {
            button.addEventListener('click', function () {
                buttons.forEach(btn => btn.classList.remove('active'));
                this.classList.add('active');

                const tab = this.dataset.tab;

                if (tab === 'likes' && !isAuthenticated) {
                    window.location.href = '/login';
                    return; 
                }
                contents.forEach(content => {
                    if (content.id === tab) {
                        content.classList.remove('hidden');
                    } else {
                        content.classList.add('hidden');
                    }
                });
            });
        });
    });
</script>

@auth
<a href="{{ url('mypage') }}"><button>mypageへ</button></a>
<br>
<p>{{ $user->name }}</p>
<img src="{{ asset('storage/' . $user->avatar) }}" alt="プロフィール画像" width="100">
@endauth

<div class="tab__container">
    <div class="tab__btns">
        <button class="tab__btn active" data-tab="recommend">おすすめ</button>
        <button class="tab__btn" data-tab="likes">マイリスト</button>
    </div>

    <div class="tab__content" id="recommend">
        @foreach ($items as $item)
            <div>
                <a href="{{ url('/item/' . $item->id) }}">
                    <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}" width="150" style="{{ $item->is_sold ? 'opacity: 0.5;' : '' }}">
                    <td>{{ $item->title }} / </td>
                    <td>¥{{ $item->price }}</td>
                </a>
                @if ($item->is_sold)
                    <span class="bg-gray-400 text-white px-2 py-1 rounded">Sold Out</span>
                @else
                    <a href="{{ url('/item/' . $item->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block"></a>
                @endif
                @auth
                <form method="POST"  action="/item/{{ $item->id }}/like" style="display: inline;">
                    @csrf
                    <button type="submit" style="background: none; border: none; cursor: pointer;">
                    {{ auth()->user()->likedItems->contains($item->id) ? '❤️' : '🤍' }}
                    </button>
                    
                </form>
                @endauth
                <p>いいね数: {{ $item->likedItems->count() }}</p>
            </div>
        @endforeach
    </div>

    <div class="tab__content hidden" id="likes">
        @foreach ($likedItems as $item)
        @if ($likedItems->isEmpty())
        <p>まだマイリストに商品がありません。</p>
        @else
        <div>
            <a href="{{ url('/item/' . $item->id) }}">
                <img src="{{ Str::startsWith($item->image, 'http') ? $item->image : asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="150" style="{{ $item->is_sold ? 'opacity: 0.5;' : '' }}">
                <td>{{ $item->title }} / </td>
                <td>¥{{ $item->price }}</td>
            </a>
            @if ($item->is_sold)
                <span class="bg-gray-400 text-white px-2 py-1 rounded">Sold Out</span>
            @else
                <a href="{{ url('/item/' . $item->id) }}" class="bg-blue-500 text-white px-4 py-2 rounded inline-block"></a>
            @endif
            @auth
            <form method="POST"  action="/item/{{ $item->id }}/like" style="display: inline;">
                @csrf
                <button type="submit" style="background: none; border: none; cursor: pointer;">
                {{ auth()->user()->likedItems->contains($item->id) ? '❤️' : '🤍' }}
                </button>
                
            </form>
            @endauth
        </div>
        @endif
        @endforeach
    </div>
</div>


@endsection







{{-- タグ検索コード   
<form method="GET" action="/">
    <select name="category_id">
        <option value="">-- カテゴリ選択 --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</form>        --}}