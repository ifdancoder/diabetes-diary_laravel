<!DOCTYPE html>
<html lang="en">

@include('components.head')

<body>
    @include('components.header')
    <main>
        <div class="container py-5">
            <h2>{{ isset($title) ? $title : 'Дневник диабетика' }}</h2>
            <div class="container">
                {{--<div class="messages" id="messages">
                    @php
                    $messages = $messages ?? get_flashed_messages(with_categories=true);
                    @endphp
                    @foreach ($messages ?? [] as $category => $message)
                        @if ($category == 'success')
                            <div class="alert alert-success">{{ $message }}</div>
                        @elseif ($category == 'info')
                            <div class="alert alert-info">{{ $message }}</div>
                        @elseif ($category == 'warning')
                            <div class="alert alert-warning">{{ $message }}</div>
                        @elseif ($category == 'error')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @else
                            <div class="alert">{{ $message }}</div>
                        @endif
                    @endforeach
                </div>--}}
                <script>
                    var divToAnimate = document.getElementById("messages");
                    divToAnimate.style.animationName = "fadeOut";
                    divToAnimate.style.animationDuration = timeInMSToInS(messagesTime);
                    divToAnimate.style.animationIterationCount = 1;
                    setTimeout(function() {
                        divToAnimate.remove();
                    }, messagesTime);

                </script>
                @yield('content')
            </div>
        </div>
    </main>
    @include('components.footer')
</body>

</html>
