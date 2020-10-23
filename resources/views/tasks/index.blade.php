@extends('layouts.app')

@section('content')
<div class="container">
    <div class="mb-4">
        <h1>Todoリスト</h1>
        <a href="/categories">カテゴリー管理</a>
    </div>

    <div class="mb-4">
        <h2>Todo作成</h2>
        <form action="/tasks" method="post">
            @csrf
            <input type="text" name="content">
            <select name="category_id">
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            <input type="submit" value="作成">
        </form>
    </div>

    <h2>Todo一覧</h2>
    <ul>
        @foreach($categories as $category)
            <li>{{ $category -> name }}</li>
            <ul>
                @foreach($category->tasks as $task)
                    <li>{{$task->content}}</li>
                    <form action="/tasks/{{$task -> id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="削除">
                    </form>
                    <a href="/tasks/{{$task -> id}}/edit">編集</a>
                @endforeach
            </ul>
        @endforeach
    </ul>
</div>
@endsection