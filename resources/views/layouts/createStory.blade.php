<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YukNulis</title>

    <!-- Styles --->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    @stack('styles')

    <!-- Scripts --->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<body>
    <header>
        <x-navbar-createStory/>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        
    </footer>
    
    <!-- Scripts --->
    @stack('scripts')
    <script src="{{ asset('js/bootstrap.bundle.min.js') }}"></script>
</body>
</html>