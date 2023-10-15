@extends('components.base')

@section('content')
<form method="POST" action="{{ route('auth.register.post') }}">
    @csrf
    <div class="form-group">
        <label for="first_name">Имя</label>
        <input type="first_name" class="form-control" id="first_name" name="first_name">
        @error('first_name')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="last_name">Фамилия</label>
        <input type="last_name" class="form-control" id="last_name" name="last_name">
        @error('last_name')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" class="form-control" id="email" name="email">
        @error('email')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password1">Пароль</label>
        <input type="password" class="form-control" id="password1" name="password1">
        @error('password1')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="password2">Пароль еще раз</label>
        <input type="password" class="form-control" id="password2" name="password2">
        @error('password2')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="remember_me" name="remember_me">
        <label class="form-check-label" for="remember_me">Запомнить меня</label>
    </div>
    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
</form>
@endsection
