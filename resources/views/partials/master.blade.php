<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="icon" type="image/x-icon" href="{{ url('https://img.icons8.com/papercut/60/garage-closed.png') }}">
    <title>@yield('title')</title>
</head>

<body>
    @php
        $session = session('user_info');
    @endphp
    @if ($session['role_id'] == 1)
        @include('partials.admin.sidebar')
    @else
        @include('partials.employee.sidebar')
    @endif

    <section id="main" class="row">
        <div class="flex flex-col mx-auto">
            <div class="p-4 mt-12 sm:ml-64">
                <div class="w-full bg-white p-4 md:p-6">
                    @yield('content')
                </div>
            </div>
        </div>
    </section>

    @yield('scripts')
</body>

</html>
