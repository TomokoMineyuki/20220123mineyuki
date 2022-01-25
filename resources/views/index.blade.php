<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>COACHTECH</title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/style.css" />
    <style>
    </style>
  </head>
  <body>
    <div class="container">
      <div class="card">
        <p class="title mb-15">Todo List</p>
          @if (count($errors) > 0)
            <ul>
            @foreach ($errors->all() as $error)
            <li>
              {{$error}}
            </li>
            @endforeach
            </ul>
          @endif
        <div class =todo>
          <form action="/todo/create" method="post" class="flex between mb-30">
            @csrf
            <input type="text" class="input-add" name="content">
            <input class="button-add" type="submit" value="追加">
          </form>
          <table>
            <tbody>
              <tr>
                <th>作成日</th><th>タスク名</th><th>更新</th><th>削除</th>
              </tr>
              @foreach ($items as $item)
              <tr>
                <td>{{$item->created_at}}</td>
                <form action="{{ route('todo.update', ['id' => $item->id]) }}" method="post">
                  @csrf
                <td>
                  <input type="text" class="input-update" value="{{$item->content}}" name="content">
                </td>
                <td>
                  
                  <button class="button-update">更新</button>
                </td>
                </form>
                <td>
                  <form action="{{ route('todo.delete', ['id' => $item->id]) }}" method="post">
                    @csrf
                  <button class="button-delete">削除</button>
                  </form>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>