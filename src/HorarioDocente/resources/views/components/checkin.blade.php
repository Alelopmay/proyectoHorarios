<!-- resources/views/components/checkin.blade.php -->
<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Registrar Asistencia</h2>

    <!-- Reloj -->
    <div id="clock" class="text-xl font-semibold text-gray-700 mb-6">
        <!-- El reloj se actualizará aquí -->
    </div>

    <form action="{{ route('checkin.store') }}" method="POST">
        @csrf

        <!-- Nombre del Profesor -->
        <div class="mb-4">
            <label for="teacher_name" class="block text-sm font-semibold text-gray-700">Nombre del Profesor</label>
            <input type="text" name="teacher_name" id="teacher_name" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Contraseña del Profesor -->
        <div class="mb-4">
            <label for="password" class="block text-sm font-semibold text-gray-700">Contraseña</label>
            <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <!-- Fecha -->
        <div class="mb-4">
            <label for="date" class="block text-sm font-semibold text-gray-700">Fecha</label>
            <input type="date" name="date" id="date" class="w-full p-2 border border-gray-300 rounded-md" required>
        </div>

        <button type="submit" class="w-full py-2 px-4 bg-green-600 text-white font-semibold rounded-md hover:bg-green-700">
            Registrar Asistencia
        </button>
    </form>
</div>

<script>
    // Función para actualizar el reloj cada segundo
    function updateClock() {
        const clockElement = document.getElementById('clock');
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');

        // Formato: HH:MM:SS
        clockElement.textContent = `${hours}:${minutes}:${seconds}`;
    }

    // Llamamos a la función cada segundo
    setInterval(updateClock, 1000);

    // Inicializamos el reloj cuando la página se carga
    updateClock();
</script>
