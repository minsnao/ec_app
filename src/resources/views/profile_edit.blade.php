@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class=>
        @foreach ($errors->all() as $error)
            <p>{{ $error }}</p>
        @endforeach
    </div>
@endif

@auth
<div class="input__form">
    <h2>プロフィール設定</h2>
    <form action="{{ url('/mypage/profile') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <!-- 残り画像の処理を行う -->
        <div>
            <div>
                @if($user->avatar)
                <img src="{{ asset('storage/' . $user->avatar) }}" alt="プロフィール画像" width="100">
                @else
                <p>画像は未登録です</p>
                @endif
                <input type="file" name="avatar" id="avatarInput">
                <img id="avatarPreview" src="" alt="画像プレビュー" style="display:none; width:100px; margin-top:10px;">
                <script>
                    document.getElementById('avatarInput').addEventListener('change', function(event) {
                        const file = event.target.files[0];
                        const preview = document.getElementById('avatarPreview');
                        const currentAvatar = document.getElementById('currentAvatar');

                        if (file && file.type.startsWith('image/')) {
                            const reader = new FileReader();

                            reader.onload = function(e) {
                                preview.src = e.target.result;
                                preview.style.display = 'block';  // プレビュー画像を表示
                                if(currentAvatar) currentAvatar.style.display = 'none'; // 元の画像を非表示に
                            };

                            reader.readAsDataURL(file);
                        } else {
                            preview.src = '';
                            preview.style.display = 'none';
                            if(currentAvatar) currentAvatar.style.display = 'block';
                        }
                    });
                </script>
            </div>
        </div>
        <!-- ↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑↑ -->

        <div class="form__group">
            <label for="name">ユーザー</label>
            <input type="text" name="name" value="{{ old('name', $user->name ?? '') }}">
        </div>
        <div class="form__group">
            <label for="postal_code">郵便番号</label>
            <input type="text" name="postal_code" value="{{ old('postal_code', $profile->postal_code ?? '') }}">
        </div>
        <div class="form__group">
            <label for="address">住所</label>
            <input type="text" name="address" value="{{ old('address', $profile->address ?? '') }}">
        </div>
        <div class="form__group">
            <label for="building">建物名</label>
            <input type="text" name="building" value="{{ old('address', $profile->building ?? '') }}">
        </div>
        <div class="form__btn">
            <button type="submit">更新する</button>
        </div>
    </form>
</div>
@endauth

@endsection