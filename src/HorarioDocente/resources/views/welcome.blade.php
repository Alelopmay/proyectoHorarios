<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido a HorarioDocente</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 via-blue-300 to-blue-500 min-h-screen flex flex-col items-center justify-center text-gray-800">

    <!-- Encabezado -->
    <header class="w-full text-center py-8">
        <h1 class="text-4xl md:text-6xl font-bold text-white drop-shadow-lg">
            Bienvenido a <span class="text-blue-900">HorarioDocente</span>
        </h1>
        <p class="text-lg md:text-2xl text-white mt-4">
            La solución ideal para gestionar horarios y profesores de forma eficiente.
        </p>
    </header>

    <!-- Contenido Principal -->
    <main class="w-full px-4 sm:w-2/3 lg:w-1/2 flex flex-col items-center mt-8">
        <!-- Sección de descripción -->
        <div class="bg-white rounded-2xl shadow-lg p-8 mb-6 text-center">
            <h2 class="text-2xl font-semibold text-blue-800">¿Por qué elegir HorarioDocente?</h2>
            <p class="text-gray-600 mt-4">
                Nuestra plataforma te ofrece una interfaz intuitiva para administrar horarios de profesores, registrar asistencia y organizar institutos de manera profesional.
            </p>
        </div>

        <!-- Sección de llamado a la acción -->
        <div class="flex flex-col items-center">
            <a href="{{ route('home') }}"
            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full text-lg shadow-lg transition-all duration-300">
                Ir al Panel de Control
            </a>
            <p class="text-sm text-gray-200 mt-4">
                ¿Listo para empezar? ¡Haz clic en el botón de arriba!
            </p>
        </div>
    </main>

    <!-- Pie de página -->
    <footer class="w-full mt-12 py-6 bg-blue-900 text-center text-gray-200">
        <p>&copy; {{ date('Y') }} HorarioDocente. Todos los derechos reservados.</p>
    </footer>

</body>
</html>
