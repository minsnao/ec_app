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
        @csrf
        <div class="form__group">
            <label for="image">商品の画像</label>
            <div>
                <input type="file" name="image" id="imageInput">
                <img id="imagePreview" src="" alt="画像プレビュー" style="display:none; width:100px; margin-top:10px;">
                <script>
                    document.getElementById('imageInput').addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        const preview = document.getElementById('imagePreview');
                        const currentImage = document.getElementById('currentImage');

                        if (file && file.type.startsWith('image/')) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.style.display = 'block';  // プレビュー画像を表示
                                if(currentImage) currentImage.style.display = 'none'; // 元の画像を非表示に
                            };

                            reader.readAsDataURL(file);
                        } else {
                            preview.src = '';
                            preview.style.display = 'none';
                            if(currentImage) currentImage.style.display = 'block';
                        }
                    });
                </script>
            </div>
        </div>
        <br>
        <div class="form__group">
            <div style="border-bottom: 1px solid gray; padding-bottom: none; margin-bottom: 5px;">
                <h2>商品の詳細</h2>
            </div>            
        </div>
        
        <!-- checkboxの大きさ揃える -->
        <div class="form__group__category">
            <label for="categories">カテゴリー</label>
            @foreach($categories as $category)
                {{ $category->name }}
                <input type="checkbox" name="categories[]" value="{{ $category->id }}" {{ is_array(old('categories')) && in_array($category->id, old('categories')) ? 'checked' : '' }}>
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