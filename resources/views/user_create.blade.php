<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style> .is-invalid {color: red;}</style>
</head>
<body>
    <h2>Добавление пользователя</h2>
        <form method="post" action="{{url('user')}}">
        @csrf
            <label>Имя пользователя</label>
        <input type="text" name="name" value="{{old('name')}}">
        @error('name')
        <div class="is-invalid">{{$message}}</div>
        @enderror
        <br>
        <label>Почта</label>
            <input type="text" name="email" value="{{ old('email') }}">
        @error('email')
            <div class="is-invalid">{{$message}}</div>
        @enderror
        <label>Пароль</label>
            <input type="text" name="password" value="{{ old('password') }}">
        @error('password')
        <div class="is-invalid">{{$message}}</div>
        @enderror
            <label>Права администратора</label>
            <select name="isadmin">
                <option value="0">нет</option>
                <option value="1" selected>да</option>
            </select>
        @error('isadmin')
            <div class="is-invalid">{{$message}}</div>
        @enderror
            <br>
            <input type="submit">
        </form>
</body>
</html>
