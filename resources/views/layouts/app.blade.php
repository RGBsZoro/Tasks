<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Simple Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            min-height: 100vh;
            background-color: #212529;
        }
        .sidebar a {
            color: #fff;
            text-decoration: none;
        }
        .sidebar a.active {
            background-color: #0d6efd;
        }
    </style>
</head>
<body>
    @include('partials.header')

    <div class="container-fluid">
        <div class="row">

            <div class="col-md-2 sidebar p-3">
                @include('partials.sidebar')
            </div>

            <div class="col-md-10 p-4">
                @yield('content')
            </div>

        </div>
    </div>

    @include('partials.footer')

</body>
</html>