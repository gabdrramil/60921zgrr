<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h2>{{$thread ? "Список сообщений в теме ".$thread->name : 'Неверный id темы'}}</h2>
    @if($thread)
        <table border="1">
            <td>id</td>
            <td>Сообщение</td>
            @foreach($thread->comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->comment}}</td>
                </tr>
            @endforeach
        </table>
    @endif
</body>
</html>

