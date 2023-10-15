<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ Vite::asset('resources/img/blood.png') }}" alt="Logo" width="50" height="50" class="mr-2 align-middle">
            <h1 class="d-inline align-middle">Дневник диабетика</h1>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Главная</a>
                </li>
                @if (Auth::check())
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.record')}}"><i class="bi-plus-circle"></i> Запись</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.basal')}}"><i class="bi-graph-up"></i> База</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Профиль</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Дневник</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('profile.settings') }}">Настройки</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.logout') }}">Выйти</a>
                </li>
                @else
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.login') }}">Войти</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('auth.register') }}">Зарегистрироваться</a>
                </li>
                @endif  
            </ul>
        </div>
    </div>
</nav>
