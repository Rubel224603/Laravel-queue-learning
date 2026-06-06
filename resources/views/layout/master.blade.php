<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">

    @stack('styles')
</head>

<body>
    <main>
        @yield('content')
    </main>


    @stack('scripts')
</body>

</html>
