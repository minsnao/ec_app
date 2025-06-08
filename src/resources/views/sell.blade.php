@extends('layouts.app')

@section('content')

<form action="{{ url('/sell') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div>
        <table>
            <tr>
                <th>商品画像</th>
                <td><input type="file" name="image"></td>
            </tr>
            <tr>
                <th>カテゴリー</th>
                <td>
                    @foreach($categories as $category)
                    <label>
                        <input type="checkbox" name="categories[]" value="{{ $category->id }}">{{ $category->name }}
                    </label>
                    @endforeach
                </td>
            </tr>
            <tr>
                <th>商品の状態</th>
                <td>
                    <select name="condition">
                    <option value="" selected hidden>選択してください</option>
                    <option value="良好">良好</option>
                    <option value="目立った傷や汚れなし">目立った傷や汚れなし</option>
                    <option value="やや傷や汚れあり">やや傷や汚れあり</option>
                    <option value="状態が悪い">状態が悪い</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>
                    <h3>商品名と説明</h3>
                </th>
            </tr>
            <tr>
                <th>商品名</th>
                <td><input type="text" name="title"></td>
            </tr>
            <tr>
                <th>ブランド名</th>
                <td><input type="text" name="brand"></td>
            </tr>
            <tr>
                <th>商品の説明</th>
                <td><textarea name="description"></textarea></td>
            </tr>
            <tr>
                <th>値段</th>
                <td>￥ <input type="number" name="price"></td>
            </tr>
        </table>
        <div>
            <button type="submit">登録</button>
        </div> 
    </div>

</form>

@endsection