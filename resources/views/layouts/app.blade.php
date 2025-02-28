<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title', 'Mi Aplicación Laravel')</title>
    <!-- Cargar CSS con Vite -->
    @vite(['resources/css/app.css'])
    <!-- Scripts de cabecera (opcional) -->
    @stack('head-scripts')
</head>

<body class="bg-gray-100">
    <!-- Barra de navegación -->
    <nav class="bg-white shadow">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center py-4">
                <a class="text-xl font-bold text-gray-800" href="{{ url('/') }}">Mi Aplicación</a>
                <div class="flex space-x-4">
                    <a class="text-gray-800 hover:text-gray-600" href="{{ route('home') }}">Inicio</a>
                    <a class="text-gray-800 hover:text-gray-600" href="{{ route('users.create') }}">Registro</a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mx-auto px-4 py-8">
        @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
            {{ session('error') }}
        </div>
        @endif

        @yield('content')
    </div>

    <!-- Pie de página -->
    <footer class="bg-white shadow mt-8">
        <div class="container mx-auto px-4 py-4 text-center">
            <p class="text-gray-600">&copy; {{ date('Y') }} Mi Aplicación. Todos los derechos reservados.</p>
        </div>
    </footer>

    <!-- Cargar JS con Vite -->
    @vite(['resources/js/app.js'])

    <!-- Scripts adicionales (opcional) -->
    @stack('scripts')
</body>

</html>