<!doctype html>
<html>
    <head>
        <title>タスク管理</title>
    </head>
    <body>
        <h1>タスク一覧</h1>
        <a href="/categories">カテゴリー管理</a>
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
    </body>
</html>
