<nav class="navbar navbar-expand-lg navbar-dark bg-success navbar-compact">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('images/logo.png') }}" alt="Logo" height="40">
        </a>

        <!-- Кнопка для мобильных -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Основное содержимое навигации -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="https://google.com">Темы</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="https://google.com">Кнопка 2</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('user') }}">Список пользователей</a>
                </li>
            </ul>

            <div class="d-flex">
                @auth
                    <!-- Авторизованный пользователь -->
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle" type="button" id="userDropdown" data-bs-toggle="dropdown">
                            <img src="{{ asset('images/avatar.png') }}" alt="User" class="rounded-circle me-2" width="32" height="32">
                            {{ Auth::user()->name }}
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <button type="submit" class="dropdown-item">
                                        <i class="fa fa-sign-out me-2"></i> Выход
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                @else
                    <!-- Неавторизованный пользователь -->
                    <a href="{{ route('login') }}" class="btn btn-outline-primary">
                        <i class="fa fa-sign-in me-1"></i> Войти
                    </a>
                @endauth
            </div>
        </div>
    </div>
</nav>
