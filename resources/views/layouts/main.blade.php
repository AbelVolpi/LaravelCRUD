<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    {{-- Google Fonts (robot) --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <script src="/js/app.js"></script>
</head>

<body>
    <style>
        h1 {
            margin-bottom: 20px;
        }
    </style>

    <header class="menu-header">
        <nav class="menu-container">
            <a href="{{ route('sales.create') }}" class="menu-item">Add sale</a>
            <a href="{{ route('employees.create') }}" class="menu-item"> Add Employee</a>
            <a href="{{ route('customers.create') }}" class="menu-item"> Add Customer</a>
            <a href="{{ route('products.create') }}" class="menu-item"> Add Product</a>
        </nav>
    </header>

    @yield('content')

    <div class="container">
        <footer>
            <p>My example Footer &copy; 2023</p>
        </footer>
    </div>
</body>

</html>
