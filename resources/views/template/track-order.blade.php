<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinayak Stationery</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>

    <!-- Header or Navbar (optional) -->
    <header>
        <h1>Vinayak Stationery</h1>
    </header>

    <!-- Page Content -->
    <div class="container">
        @yield('content')  <!-- Here we yield the content -->
    </div>

    <!-- Footer (optional) -->
    <footer>
        <p>&copy; {{ date('Y') }} Vinayak Stationery. All rights reserved.</p>
    </footer>

</body>
</html>
