<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/app.css?v=1.0">
    {{-- Google Fonts (robot) --}}
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">
    {{-- Bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="/js/app.js"></script>
</head>

<body>
    <style>
    

       footer{
        margin-top: 20px;
       }

        .menu-header {
            margin-bottom: 50px;
        }

        .menu-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 120px;
            background-color: #f0f0f0;
        }

        .menu-item {
            display: inline-block;
            padding: 10px 20px;
            margin: 0 10px;
            background-color: #ccc;
            color: #fff;
            text-decoration: none;
            transition: background-color 0.3s;
            text-decoration: none;
        }
    </style>

    <header class="menu-header">
        <nav class="menu-container">
            <a href="{{ route('sales.create') }}" class="menu-item">Add sale</a>
            <a href="#" class="menu-item"> Add Employee</a>
            <a href="#" class="menu-item"> Add Custumer</a>
            <a href="#" class="menu-item"> Add Product</a>
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
