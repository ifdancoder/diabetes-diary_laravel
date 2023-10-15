@extends('components.base')

@section('content')
<form method="POST" action="{{ route('auth.login.post') }}">
    @csrf
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email">
        @error('email')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" class="form-control" id="password" name="password">
        @error('password')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
        <label class="form-check-label" for="remember_me">Запомнить меня</label>
    </div>
    <button type="submit" class="btn btn-primary">Войти</button>
</form>
@endsection
