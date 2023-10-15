<head>
    <meta charset="UTF-8">
    <title>{{ isset($title) ? $title : 'Дневник диабетика' }}</title>
    <link rel="icon" href="{{ Vite::asset('resources/img/blood.png') }}" type="image/png">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    @vite(['/resources/js/app.js', '/resources/js/diabetesdiary.js', '/resources/css/diabetesdiary.css'])
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
