@extends('layouts.app')

@section('content')
<div class="container">
    <h1>タスクの編集</h1>
    <form action="/tasks/{{$task -> id}}" method="post">
        @csrf
        @method('PUT')
        <input type="text" name="content" value="{{$task -> content}}">
        <input type="submit" value="更新">
    </form>
    <a href="/tasks">一覧へ戻る</a>
</div>
@endsection