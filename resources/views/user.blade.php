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
    <h2>Список пользователей</h2>
    <table border="1">
        <thead>
            <td>id</td>
            <td>Имя пользователя</td>
            <td>email</td>
            <td>Пароль</td>
            <td>Права администратора</td>
        </thead>
        @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->password}}</td>
                <td>{{$user->isadmin}}</td>
                <td> <a href="{{url('user/destroy/'.$user->id)}}">Удалить</a>
                    <a href="{{url('user/edit/'.$user->id) }}">Редактировать</a>
                </td>
            </tr>

        @endforeach
    </table>
</body>
</html>
