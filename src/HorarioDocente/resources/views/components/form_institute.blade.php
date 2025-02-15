<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Institutos</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body class="bg-gray-50 font-sans leading-tight tracking-tight">

    <div class="flex justify-center min-h-screen items-center px-6 py-12">

        <!-- Contenedor principal -->
        <div class="w-full max-w-4xl bg-white rounded-lg shadow-lg p-8 space-y-6">

            <!-- Título de la página -->
            <h1 class="text-3xl font-semibold text-blue-900 text-center mb-8">Gestión de Institutos</h1>

            <!-- Formulario para crear un nuevo instituto -->
            <div class="bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-blue-900 mb-6">Crear Nuevo Instituto</h2>

                <form action="{{ route('institutes.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Instituto</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Nombre del instituto" required>
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700">Dirección del Instituto</label>
                        <input type="text" id="address" name="address" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none" placeholder="Dirección del instituto" required>
                    </div>

                    <button type="submit" class="w-full py-2 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none transition duration-300">Crear Instituto</button>
                </form>
            </div>

            <!-- Lista de Institutos -->
            <div class="mt-12 bg-white p-6 rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold text-blue-900 mb-6">Lista de Institutos</h2>

                <!-- Mensajes de éxito y error -->
                @if (session('success'))
                    <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
                        {{ session('error') }}
                    </div>
                @endif

                <!-- Lista de Institutos -->
                <ul class="space-y-4">
                    @forelse ($institutes as $institute)
                        <li class="p-4 bg-white rounded-lg shadow-sm flex justify-between items-center space-x-4 border border-gray-300">
                            <span class="font-medium text-gray-700">
                                {{ $institute->name }} - {{ $institute->address }}
                            </span>

                            <!-- Contenedor para los botones de editar y eliminar -->
                            <div class="flex space-x-2">
                                <!-- Botón de edición -->
                                <button class="px-4 py-2 bg-yellow-500 text-white rounded-md hover:bg-yellow-600 focus:outline-none transition duration-300"
                                        onclick="document.getElementById('edit-form-{{ $institute->id }}').classList.toggle('hidden')">
                                    Editar
                                </button>

                                <!-- Formulario de edición -->
                                <form id="edit-form-{{ $institute->id }}" action="{{ route('institutes.update', $institute->id) }}" method="POST" class="hidden mt-4 space-y-4 w-full">
                                    @csrf
                                    @method('PUT')

                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-700">Nombre del Instituto</label>
                                        <input type="text" name="name" value="{{ $institute->name }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
                                    </div>

                                    <div>
                                        <label for="address" class="block text-sm font-medium text-gray-700">Dirección del Instituto</label>
                                        <input type="text" name="address" value="{{ $institute->address }}" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 focus:outline-none" required>
                                    </div>

                                    <button type="submit" class="w-full py-2 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700 focus:outline-none transition duration-300">Actualizar Instituto</button>
                                </form>

                                <!-- Botón de eliminación -->
                                <form action="{{ route('institutes.destroy', $institute->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="px-4 py-2 bg-red-500 text-white rounded-md hover:bg-red-600 focus:outline-none transition duration-300"
                                            onclick="return confirm('¿Estás seguro de eliminar este instituto?')">
                                        Eliminar
                                    </button>
                                </form>
                            </div>
                        </li>
                    @empty
                        <li class="text-center p-4 bg-white rounded-lg shadow-sm">
                            No hay institutos registrados.
                        </li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
