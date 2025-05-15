<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .navbar-custom {
            background-color: #28a745; /* Зелёный цвет Bootstrap */
        }
        .navbar-custom .navbar-brand,
        .navbar-custom .nav-link,
        .navbar-custom .dropdown-item {
            color: white !important;
        }
        .navbar-compact {
            min-height: 50px;  /* Вместо стандартных 56px */
            padding-top: 0.05rem;
            padding-bottom: 0.05rem;
        }

        /* Уменьшаем логотип */
        .navbar-brand img {
            height: 30px !important;  /* Вместо 40px */
        }

        /* Уменьшаем элементы навигации */
        .navbar-compact .nav-link {
            padding: 0.25rem 0.5rem;
            font-size: 0.9rem;
        }

        /* Уменьшаем аватар пользователя */
        .user-avatar {
            width: 28px;
            height: 28px;
        }

        /* Уменьшаем кнопки */
        .navbar-compact .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
        }
    </style>
</head>
<body>
@include('header')
<main class="container py-4">
    @include('error')
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
