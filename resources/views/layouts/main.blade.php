<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css">
    {{-- Google Fonts (robot) --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="/js/app.js"></script>
</head>

<body>
    @yield('content')
    <div class="container">
        <footer>
            <p>My example Footer &copy; 2023</p>
        </footer>
    </div>
</body>

</html>
