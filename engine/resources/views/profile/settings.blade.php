@extends('components.base')

@section('content')
<form method="POST" action="{{ route('profile.settings.post') }}">
    @csrf
    <div class="form-group">
        <label for="timezone">Выберите временную зону</label>
        <select class="form-control" id="timezone" name="timezone">
            @php
                $user = Auth::user();
                function formatTimezoneOffset($offset) {
                    $hours = intval(abs($offset) / 3600);
                    $minutes = intval((abs($offset) % 3600) / 60);
                    $sign = $offset >= 0 ? '+' : '-';
                    return sprintf('%s%02d:%02d', $sign, $hours, $minutes);
                }
            @endphp
            @foreach ($timezones as $timezone)
                <option value="{{ $timezone->id }}" data-offset="{{ formatTimezoneOffset($timezone->offset) }}" {{ isset($user->timezone_id) && $user->timezone_id == $timezone->id ? 'selected' : '' }}>
                    {{ $timezone->timezone_name }} ({{ formatTimezoneOffset($timezone->offset) }})
                </option>
            @endforeach
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
@endsection
