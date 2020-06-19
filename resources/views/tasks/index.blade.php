<!doctype html>
<html>
    <head>
        <title>タスク管理</title>
    </head>
    <body>
        <h1>タスク一覧</h1>
        <form action="/tasks" method="post">
            @csrf
            <input type="text" name="content">z
            <input type="submit" value="作成">
        </form>
        <ul>
            @foreach($tasks as $task)
                <li>{{ $task -> content }}</li>
                <form action="/tasks/{{$task -> id}}" method="post">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="削除">
                </form>
                <a href="/tasks/{{$task -> id}}/edit">編集</a>
            @endforeach
        </ul>
    </body>
</html>
