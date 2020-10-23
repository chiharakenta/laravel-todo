@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h1>カテゴリー一覧</h1>
        <a href="/tasks">タスク一覧に戻る</a>
    </div>
    
    <div class="mb-4">
        <h2>カテゴリー作成</h2>
        <form action="/categories" method="post">
            @csrf
            <input type="text" name="name">
            <!--<select name="category_id">
            </select>-->
            <input type="submit" value="作成">
        </form>
    </div>

    <div class="mb-4">
        <h2>カテゴリー一覧</h2>
        <ul>
            @foreach($categories as $category)
                <li>{{ $category -> name }}</li>
                <form action="/categories/{{$category -> id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除">
                </form>
                <a href="/categories/{{$category -> id}}/edit">編集</a>
            @endforeach
        </ul>
    </div>
</div>
@endsection
