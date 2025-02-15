<h1 class="text-center text-4xl font-extrabold text-blue-900 mb-8">Gestionar Profesores</h1>

<!-- Mensajes de éxito o error -->
<div id="message" class="text-center mt-4 text-lg">
    @if (session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded-lg shadow-md mb-4">
            {{ session('success') }}
        </div>
    @elseif (session('error'))
        <div class="bg-red-200 text-red-800 p-4 rounded-lg shadow-md mb-4">
            {{ session('error') }}
        </div>
    @endif
</div>

<!-- Formulario para crear profesor -->
<form id="createTeacherForm" class="max-w-4xl mx-auto p-8 bg-white rounded-lg shadow-lg space-y-6 border border-gray-200">
    @csrf
    <h2 class="text-2xl font-semibold text-gray-800 mb-6">Añadir Nuevo Profesor</h2>
    
    <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-1">
            <label for="name" class="font-semibold text-gray-700">Nombre</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" required class="w-full p-4 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
            @error('name')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex-1">
            <label for="category" class="font-semibold text-gray-700">Categoría</label>
            <input type="text" name="category" id="category" value="{{ old('category') }}" required class="w-full p-4 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
            @error('category')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="flex flex-col md:flex-row gap-4">
        <div class="flex-1">
            <label for="age" class="font-semibold text-gray-700">Edad</label>
            <input type="number" name="age" id="age" value="{{ old('age') }}" required class="w-full p-4 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
            @error('age')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex-1">
            <label for="password" class="font-semibold text-gray-700">Contraseña</label>
            <input type="password" name="password" id="password" required class="w-full p-4 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
            @error('password')
                <div class="text-red-500 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <button type="submit" class="w-full py-4 bg-indigo-600 text-white font-semibold rounded-md hover:bg-indigo-700 focus:outline-none transition duration-300 ease-in-out">Crear Profesor</button>
</form>

<!-- Tabla para mostrar la lista de profesores -->
<div class="mt-12">
    <h2 class="text-2xl font-semibold text-blue-800 mb-6">Lista de Profesores</h2>
    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
        <thead class="bg-gray-100">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900">Nombre</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900">Categoría</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900">Edad</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-900">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($teachers as $teacher)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $teacher->name }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $teacher->category }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $teacher->age }}</td>
                    <td class="px-6 py-4 text-sm font-medium text-gray-900 flex space-x-3">
                        <!-- Botón de editar -->
                        <button class="text-blue-600 hover:text-blue-800 focus:outline-none transition duration-200 ease-in-out" onclick="editTeacher({{ $teacher->id }})">
                            <i class="fas fa-edit"></i> Editar
                        </button>
                        
                        <!-- Botón de eliminar -->
                        <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-800 focus:outline-none transition duration-200 ease-in-out">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Formulario para editar profesor (oculto por defecto) -->
<div id="editFormContainer" class="fixed inset-0 flex items-center justify-center bg-gray-800 bg-opacity-50 hidden">
    <div class="bg-white p-8 rounded-lg shadow-lg w-96">
        <h2 class="text-2xl font-semibold text-gray-800 mb-4">Editar Profesor</h2>
        <form id="editTeacherForm">
            @csrf
            @method('PUT')
            <div>
                <label for="editName" class="font-semibold text-gray-700">Nombre</label>
                <input type="text" name="name" id="editName" class="w-full p-4 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
            </div>
            <div class="mt-4">
                <label for="editCategory" class="font-semibold text-gray-700">Categoría</label>
                <input type="text" name="category" id="editCategory" class="w-full p-4 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
            </div>
            <div class="mt-4">
                <label for="editAge" class="font-semibold text-gray-700">Edad</label>
                <input type="number" name="age" id="editAge" class="w-full p-4 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
            </div>
            <div class="mt-4">
                <label for="editPassword" class="font-semibold text-gray-700">Contraseña</label>
                <input type="password" name="password" id="editPassword" class="w-full p-4 border border-gray-300 rounded-md focus:ring-2 focus:ring-indigo-500 transition duration-300 ease-in-out">
            </div>
            <div class="mt-4 flex justify-end space-x-4">
                <button type="button" onclick="closeEditForm()" class="text-gray-500 hover:text-gray-700">Cancelar</button>
                <button type="submit" class="py-2 px-6 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none transition duration-300 ease-in-out">Guardar Cambios</button>
            </div>
        </form>
    </div>
</div>

<script>
// Función para mostrar el formulario de edición
function editTeacher(id) {
    // Hacer una solicitud AJAX para obtener los datos del profesor
    fetch(`/teachers/${id}/edit`)
        .then(response => response.json())
        .then(data => {
            // Llenar el formulario de edición con los datos del profesor
            document.getElementById('editName').value = data.name;
            document.getElementById('editCategory').value = data.category;
            document.getElementById('editAge').value = data.age;
            document.getElementById('editPassword').value = ''; // No mostrar la contraseña

            // Actualizar la acción del formulario de edición
            document.getElementById('editTeacherForm').action = `/teachers/${id}`;

            // Mostrar el formulario de edición
            document.getElementById('editFormContainer').classList.remove('hidden');
        });
}

// Función para cerrar el formulario de edición
function closeEditForm() {
    document.getElementById('editFormContainer').classList.add('hidden');
}
</script>
