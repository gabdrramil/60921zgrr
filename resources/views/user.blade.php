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
    <h2>{{$user ? "Список тем пользователя: " .$user->name : "Неверный id пользователя"}}</h2>
    @if($user)
        <table border="1">
            <tr>
                <td>id</td>
                <td>Тема</td>
            </tr>
            @foreach($user->threads as $thread)
                <tr>
                    <td>{{$thread->id}}</td>
                    <td>{{$thread->name}}</td>
                </tr>
            @endforeach
        </table>
    @endif

</body>
</html>
