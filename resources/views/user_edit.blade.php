@extends('layout')
@section('content')
    <div class="row justify-content-center">
        <div class="title"><h2>Редактирование пользователя</h2></div>
        <form method="POST" action="/user/update/{{ $user->id }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Имя пользователя</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name" aria-describedby="nameHelp" value="{{ old('name', $user->name) }}">
                <div id="nameHelp" class="form-text">Введите имя пользователя (макс. 255 символов)</div>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Почта</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" aria-describedby="emailHelp" value="{{ old('email', $user->email) }}">
                <div id="emailHelp" class="form-text">Введите адресс электронной почты name@domain</div>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" aria-describedby="passwordHelp">
                <div id="passwordHelp" class="form-text">Оставьте пустым, если не нужно менять</div>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="admin-rights" class="form-label">Права администратора</label>
                <select class="form-select @error('isadmin') is-invalid @enderror" id="admin-rights" name="isadmin" aria-describedby="admin-rights-help">
                    <option value="0" {{ $user->isadmin == 0 ? 'selected' : '' }}>нет</option>
                    <option value="1" {{ $user->isadmin == 1 ? 'selected' : '' }}>да</option>
                </select>
                <div id="admin-rights-help" class="form-text">Выдать права администратора?</div>
                @error('isadmin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br>
            </div>
            <button type="submit" class="btn btn-primary">Обновить данные</button>
        </form>
    </div>
@endsection
