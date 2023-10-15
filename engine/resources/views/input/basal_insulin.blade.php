@extends('components.base')

@section('content')
<form method="POST" action="{{ route('profile.basal.post') }}">
    @csrf
        @foreach(range(1, 24) as $i)
            @php
            if (array_key_exists($i, $basalInsulin)) {
                $currentBasalInsulin = $basalInsulin[$i];
            }
            $hour = ($i - 1).':00-'. $i.':00';
            if ($i == 24) {
                $hour = '23:00-00:00';
            }
            @endphp
            {{--{{ isset($currentBasalInsulin) ? $currentBasalInsulin->created_at : 'Ранее записей о базальном инсулине в этот период не было' }}--}}
            <div class="form-group">
                <label for="basal{{ $i }}">Базальный инсулин ({{ $hour }}):</label>
                <input type="number" step="0.01" class="form-control" id="basal{{ $i }}" name="basal{{ $i }}" value="{{ isset($currentBasalInsulin) ? $currentBasalInsulin->value : 0}}">
                @error('basal{{ $i }}')
                    <div class="alert alert-danger" role="alert">{{ $message }}</div>
                @enderror
            </div>
        @endforeach
    <button type="submit" class="btn btn-primary">Сохранить</button>
</form>
@endsection
