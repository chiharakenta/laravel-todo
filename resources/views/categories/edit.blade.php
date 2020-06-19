<!doctype html>
<html>
<head>
    <title>タスク管理</title>
</head>
<body>
<h1>タスクの編集</h1>
<form action="/categories/{{$category -> id}}" method="post">
    @csrf
    @method('PUT')
    <input type="text" name="name" value="{{$category -> name}}">
    <input type="submit" value="更新">
</form>
<a href="/categories">一覧へ戻る</a>
</body>
</html>
