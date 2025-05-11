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
<form method="POST" action="/user/update/{{ $user->id }}">
    @csrf
    <label>Имя пользователя</label>
    <input type="text" name="name" value="{{ old('name', $user->name) }}" />
    @error('name')
    <div class="is-invalid">{{ $message }}</div>
    @enderror

    <label>Почта</label>
    <input type="text" name="email" value="{{ old('email', $user->email) }}" />
    @error('email')
    <div class="is-invalid">{{ $message }}</div>
    @enderror

    <label>Пароль</label>
    <input type="password" name="password" placeholder="Оставьте пустым, если не нужно менять" />
    @error('password')
    <div class="is-invalid">{{ $message }}</div>
    @enderror

    <label>Права администратора</label>
    <select name="isadmin">
        <option value="0" {{ $user->isadmin == 0 ? 'selected' : '' }}>нет</option>
        <option value="1" {{ $user->isadmin == 1 ? 'selected' : '' }}>да</option>
    </select>
    @error('isadmin')
    <div class="is-invalid">{{ $message }}</div>
    @enderror

    <br>
    <button type="submit">Обновить</button>
</form>
</body>
</html>
