<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Вход в систему</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root {
            --max-width: 100vw;
            --max-height: 100vh;
        }

        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background: url('https://images.unsplash.com/photo-1448375240586-882707db888b?ixlib=rb-1.2.1&auto=format&fit=crop&w=1350&q=80') no-repeat center center fixed;
            background-size: cover;
            width: var(--max-width);
            height: var(--max-height);
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .content-wrapper {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: rgba(197, 197, 197, 0.73);
            border-radius: 10px;
            padding: 2rem;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
        }

        .invalid-feedback {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }

        .btn-custom {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
        }

        .btn-custom:hover {
            background-color: #218838;
            color: white;
        }

        /* Убираем дублирующие стили для alert */
        .validation-errors {
            position: absolute;
            width: 100%;
        }

        .validation-errors .invalid-feedback {
            display: block;
            color: #dc3545;
            font-size: 0.875em;
            margin-top: 0.25rem;
            animation: fadeIn 0.3s;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
@include('error')

<div class="content-wrapper">
    <div class="login-container">
        @if ($user ?? false)
            <div class="text-center">
                <h2 class="mb-4">Здравствуйте, {{$user->name}}</h2>
                <form action="{{ route('logout') }}" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" class="btn btn-custom">Выйти из системы</button>
                </form>
            </div>
        @else
            <h2 class="text-center mb-4">Форум</h2>
            <h2 class="text-center mb-4">Вход в систему</h2>
            <form method="post" action="{{url('authenticate')}}">
                @csrf

                <div class="mb-3 position-relative">
                    <label for="email" class="form-label">E-mail</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror"
                           id="email" name="email" value="{{ old('email') }}" required>
                </div>

                <div class="mb-4 position-relative">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                           id="password" name="password" required>
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-custom">Войти</button>
                </div>
            </form>
        @endif
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
