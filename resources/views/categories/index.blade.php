<!doctype html>
<html>
<head>
    <title>カテゴリー管理</title>
</head>
<body>
<h1>カテゴリー一覧</h1>
<form action="/categories" method="post">
    @csrf
    <input type="text" name="name">
    <!--<select name="category_id">
    </select>-->
    <input type="submit" value="作成">
</form>
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
</body>
</html>
