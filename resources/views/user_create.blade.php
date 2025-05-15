@extends('layout')
@section('content')
    <div class="row justify-content-center">
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="title"><h2>Добавление пользователя</h2> </div>
        <form method="post" action="{{url('user')}}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Имя пользователя</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror"
                       id="name" name="name" aria-describedby="nameHelp" value="{{ old('name') }}">
                <div id="nameHelp" class="form-text">Введите имя пользователя (макс. 255 символов)</div>
                @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Почта</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror"
                       id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}">
                <div id="emailHelp" class="form-text">Введите адрес электронной почты name@domain</div>
                @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror"
                       id="password" name="password" aria-describedby="passwordHelp">
                <div id="passwordHelp" class="form-text">Введите пароль (макс. 255 символов)</div>
                @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="admin-rights" class="form-label">Права администратора</label>
                <select class="form-select @error('isadmin') is-invalid @enderror" id="admin-rights" name="isadmin" aria-describedby="admin-rights-help">
                    <option value="0" {{ old('isadmin', 0) == 0 ? 'selected' : '' }}>нет</option>
                    <option value="1" {{ old('isadmin', 0) == 1 ? 'selected' : '' }}>да</option>
                </select>
                <div id="admin-rights-help" class="form-text">Выдать права администратора?</div>
                @error('isadmin')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <br>
            </div>
            <button type="submit" class="btn btn-primary">Добавить пользователя</button>
        </form>
    </div>
@endsection
