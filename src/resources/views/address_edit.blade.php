@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="error__msg">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@auth

<div class="input__form">
    <h2>住所の変更</h2>
    <form method="POST" action="{{ url('/purchase/address/' . $item->id) }}">
        @csrf
        @method('PATCH')
        <div class="form__group">
            <label for="postal_code">郵便番号</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', $profile->postal_code) }}">
        </div>
        <div class="form__group">
            <label for="address">住所</label>
            <input type="text" name="address" value="{{ old('address', $profile->address) }}">
        </div>
        <div class="form__group">
            <label for="building">建物名</label>
            <input type="text" name="building" value="{{ old('address', $profile->building) }}">
        </div>
        <div class="form__btn">
            <button type="submit">更新</button>
        </div>
    </form>
</div>
@endauth

@endsection