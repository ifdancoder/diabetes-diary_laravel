@extends('components.base')

@section('content')
<form method="POST" action="{{ route('profile.record.post') }}">
    @csrf
    <div class="form-group">
        <label for="datetime">Дата и время</label>
        <input oninput="handleInputChange()" type="datetime" class="form-control" id="datetime" name="datetime" value="{{ $userLocalTime }}">
        @error('text')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="basal_insulin">Базальный инсулин</label>
        <input type="number" step="0.1" class="form-control" id="basal_insulin" name="basal_insulin" readonly>
        @error('basal_insulin')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="long_chs">Медленные углеводы</label>
        <input type="number" step="0.1" class="form-control" id="long_chs" name="long_chs" value="0">
        @error('long_chs')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="middle_chs">Углеводы среднего время действия</label>
        <input type="number" step="0.1" class="form-control" id="middle_chs" name="middle_chs" value="0">
        @error('middle_chs')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="fast_chs">Быстрые углеводы</label>
        <input type="number" step="0.1" class="form-control" id="fast_chs" name="fast_chs" value="0">
        @error('fast_chs')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="bolus_insulin">Болюсный инсулин, поступающий в ближайший час</label>
        <input type="number" step="0.1" class="form-control" id="bolus_insulin" name="bolus_insulin" value="0">
        @error('bolus_insulin')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="physical_time">Время действия физической нагрузки в минутах (по окончании)</label>
        <input type="number" step="0.1" class="form-control" id="physical_time" name="physical_time" value="0">
        @error('physical_time')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="physical_intensity">Субъективная оценка интенсивности физической нагрузки (по окончании)</label>
        <input type="number" step="0.1" class="form-control" id="physical_intensity" name="physical_intensity" value="0">
        @error('physical_intensity')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="stress_level">Субъективная оценка уровня стресса</label>
        <input type="number" step="0.1" class="form-control" id="stress_level" name="stress_level" value="0">
        @error('stress_level')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="sleep_time">Время сна в часах (по окончании)</label>
        <input type="number" step="0.1" class="form-control" id="sleep_time" name="sleep_time" value="0">
        @error('sleep_time')
            <div class="alert alert-danger" role="alert">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="changing_cannula"
            name="changing_cannula">
        <label class="form-check-label" for="changing_cannula">Смена канюли</label>
    </div>
    <div class="form-group">
        <label for="comment">Комментарий</label>
        <textarea class="form-control" id="comment" name="comment"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
@endsection

@Vite(['resources/js/datetimepicker.js'])

<script>
    var basal = {};
    let datetime = null;
    let basal_element = null;
    let basal_insulin_json = null;

    window.addEventListener('load', function() {
        datetime = document.getElementById('datetime');
        basal_element = document.getElementById('basal_insulin');
        basal_insulin_json = JSON.parse({!! "'".json_encode($basalInsulin)."'" !!});
        for (let item in basal_insulin_json) {
            basal[item] = basal_insulin_json[item];
        }
        handleInputChange();
    });

    function getLocalDateTime() {
        const localDate = new Date();
        const year = localDate.getFullYear();
        const month = String(localDate.getMonth() + 1).padStart(2, '0');
        const day = String(localDate.getDate()).padStart(2, '0');
        const hours = String(localDate.getHours()).padStart(2, '0');
        const minutes = String(localDate.getMinutes()).padStart(2, '0');
        return `${year}-${month}-${day} ${hours}:${minutes}`;
    }

    function handleInputChange() {
        const [dateString, timeString] = datetime.value.split(' ');
        const [hours, minutes] = timeString.split(':');
        let hoursValue = parseInt(hours, 10);
        hoursValue = (hoursValue + 1) % 25;
        let basal_value = basal[hoursValue].value;
        basal_element.value = basal_value;
    }
</script>