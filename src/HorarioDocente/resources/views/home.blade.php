<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Control</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Función para mostrar u ocultar el formulario de creación de instituto
        function toggleForm() {
            var form = document.getElementById('form-institute');
            form.classList.toggle('hidden');
        }

        // Función para mostrar u ocultar el componente de administración de profesores
        function toggleManageTeachers() {
            var manageTeachers = document.getElementById('manage-teachers');
            manageTeachers.classList.toggle('hidden');
        }

        // Función para mostrar u ocultar el componente de registrar asistencia
        function toggleCheckIn() {
            var checkin = document.getElementById('checkin');
            checkin.classList.toggle('hidden');
        }

        // Función para mostrar u ocultar el componente de ver horarios
        function toggleSchedule() {
            var schedule = document.getElementById('schedule');
            schedule.classList.toggle('hidden');
        }
    </script>
</head>
<body class="bg-gray-100 min-h-screen flex">

    <!-- Barra Lateral -->
    <aside class="w-64 bg-blue-900 text-white min-h-screen flex flex-col">
        <div class="p-6">
            <h1 class="text-2xl font-bold">HorarioDocente</h1>
        </div>
        <nav class="flex-grow">
            <ul class="space-y-2 px-4">
                <li>
                    <button onclick="toggleForm()" class="w-full py-2 px-4 text-center bg-blue-600 hover:bg-blue-700 transition text-white font-semibold rounded-md">Crear Instituto</button>
                </li>
                <li>
                    <button onclick="toggleManageTeachers()" class="w-full py-2 px-4 text-center bg-blue-600 hover:bg-blue-700 transition text-white font-semibold rounded-md">Administrar Profesores</button>
                </li>
                <li>
                    <button onclick="toggleSchedule()" class="w-full py-2 px-4 text-center bg-blue-600 hover:bg-blue-700 transition text-white font-semibold rounded-md">Ver Horarios</button>
                </li>
                <li>
                    <!-- Botón para Registrar Asistencia -->
                    <button onclick="toggleCheckIn()" class="w-full py-2 px-4 text-center bg-blue-600 hover:bg-blue-700 transition text-white font-semibold rounded-md">Registrar Asistencia</button>
                </li>
                <li>
                    <button onclick="toggleSchedule()" class="w-full py-2 px-4 text-center bg-blue-600 hover:bg-blue-700 transition text-white font-semibold rounded-md">Configuración</button>
                </li>
            </ul>
        </nav>
        <footer class="p-4 text-center text-sm">
            &copy; {{ date('Y') }} HorarioDocente
        </footer>
    </aside>

    <!-- Contenido Principal -->
    <main class="flex-grow p-10">
        <h1 class="text-4xl font-bold text-blue-900">Bienvenido al Panel de Control</h1>
        <p class="mt-4 text-gray-700">
            Selecciona una de las opciones en la barra lateral para comenzar.
        </p>

        <!-- Componente de crear instituto (oculto inicialmente) -->
        <div id="form-institute" class="hidden mt-10">
          <x-form_institute :Institutes="$institutes" />
        </div>

        <!-- Componente de administración de profesores (oculto inicialmente) -->
        <div id="manage-teachers" class="hidden mt-10">
          
        </div>

        <!-- Componente de registrar asistencia (oculto inicialmente) -->
        <div id="checkin" class="hidden mt-10">
           <!-- Aquí debes tener el componente checkin.blade.php -->
        </div>

        <!-- Componente de ver horarios (oculto inicialmente) -->
        <div id="schedule" class="hidden mt-10">
          <!-- Asegúrate de que esta línea sea un componente Blade válido -->
         
        </div>

    </main>

</body>
</html>
