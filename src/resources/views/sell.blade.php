@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="error__msg">
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="input__form">
    <h2>商品の出品</h2>
    <form action="{{ url('/sell') }}" method="POST" enctype="multipart/form-data">
        <div class="form__group">
            <label for="image">商品の画像</label>
            <input type="file" name="image">
            <!-- ココにイメージプレビュースクリプト -->
        </div>
        <br>

        <!-- cssにクラスを充てるようにする： 現在なぜか適用できない -->
        <div class="form__group">
            <div style="border-bottom: 1px solid gray; padding-bottom: none; margin-bottom: 5px;">
                <h2>商品の詳細</h2>
            </div>            
        </div>
        
        <!-- checkboxの大きさ揃える -->
        <div class="form__group">
            <label for="categories">カテゴリー</label>
            @foreach($categories as $category)
                <input type="checkbox" name="categories[]" value="{{ $category->id }}" {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '' }}>{{ $category->name }}
            @endforeach
        </div>

        <div class="form__group">
            <label for="cndition">商品の状態</label>
            <select name="condition">
                <option value="" hidden {{ old('condition') == '' ? 'selected' : '' }}>選択してください</option>
                <option value="良好" {{ old('condition') == '良好' ? 'selected' : '' }}>良好</option>
                <option value="目立った傷や汚れなし" {{ old('condition') == '目立った傷や汚れなし' ? 'selected' : '' }}>目立った傷や汚れなし</option>
                <option value="やや傷や汚れあり" {{ old('condition') == 'やや傷や汚れあり' ? 'selected' : '' }}>やや傷や汚れあり</option>
                <option value="状態が悪い" {{ old('condition') == '状態が悪い' ? 'selected' : '' }}>状態が悪い</option>
            </select>
        </div>
        <div class="form__group">
            <label for="title">商品名</label>
            <input type="text" name="title" value="{{ old('title') }}">
        </div>
        <div class="form__group">
            <label for="brand">ブランド名</label>
            <input type="text" name="brand" value="{{ old('brand') }}">
        </div>
        <div class="form__group">
            <label for="description">商品の説明</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>
        <div class="form__group">
            <label for="price">販売価格</label>
            <input type="number" name="price" value="{{ old('price') }}" placeholder="￥">
        </div>
        <div class="form__btn">
            <button type="submit">出品する</button>
        </div>
    </form>
</div>

@endsection