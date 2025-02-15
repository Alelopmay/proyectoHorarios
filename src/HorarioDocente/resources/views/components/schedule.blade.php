<div class="bg-white p-6 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-4">Lista de Profesores</h2>

    <!-- Lista de profesores en formato de cuadrícula -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
        @forelse ($teachers as $teacher)
            <div class="p-4 border border-gray-300 rounded-md">
                <p class="text-lg font-semibold">{{ $teacher->name }}</p>
                <p class="text-sm text-gray-600">{{ $teacher->email }}</p>

                <!-- Botón para añadir horario -->
                <button 
                    onclick="toggleScheduleForm({{ $teacher->id }})" 
                    class="mt-2 py-2 px-4 bg-green-600 hover:bg-green-700 text-white font-semibold rounded-md"
                    aria-expanded="false"
                    aria-controls="schedule-form-{{ $teacher->id }}">
                    Añadir Horario
                </button>

                <!-- Formulario para añadir horario (oculto por defecto) -->
                <div id="schedule-form-{{ $teacher->id }}" class="hidden mt-4">
                    <form 
                        action="{{ route('schedule.store') }}" 
                        method="POST" 
                        onsubmit="return validateAndLogForm(event, {{ $teacher->id }})">
                        @csrf
                        <input type="hidden" name="teacher_id" value="{{ $teacher->id }}">

                        <div class="mb-4">
                            <label for="day-{{ $teacher->id }}" class="block text-sm font-medium text-gray-700">Día</label>
                            <select name="day" id="day-{{ $teacher->id }}" class="mt-1 p-2 w-full border border-gray-300 rounded-md" required>
                                <option value="" disabled selected>Selecciona un día</option>
                                <option value="Monday">Lunes</option>
                                <option value="Tuesday">Martes</option>
                                <option value="Wednesday">Miércoles</option>
                                <option value="Thursday">Jueves</option>
                                <option value="Friday">Viernes</option>
                                <option value="Saturday">Sábado</option>
                                <option value="Sunday">Domingo</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="start_time-{{ $teacher->id }}" class="block text-sm font-medium text-gray-700">Hora de inicio</label>
                            <input 
                                type="time" 
                                name="start_time" 
                                id="start_time-{{ $teacher->id }}" 
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md" 
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="end_time-{{ $teacher->id }}" class="block text-sm font-medium text-gray-700">Hora de fin</label>
                            <input 
                                type="time" 
                                name="end_time" 
                                id="end_time-{{ $teacher->id }}" 
                                class="mt-1 p-2 w-full border border-gray-300 rounded-md" 
                                required>
                        </div>

                        <button type="submit" class="py-2 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-md">Guardar Horario</button>
                    </form>
                </div>
            </div>
        @empty
            <p class="text-gray-500">No hay profesores disponibles.</p>
        @endforelse
    </div>
</div>

<script>
    /**
     * Función para mostrar u ocultar el formulario de añadir horario
     * @param {number} teacherId - ID del profesor
     */
    function toggleScheduleForm(teacherId) {
        const form = document.getElementById(`schedule-form-${teacherId}`);
        const button = document.querySelector(`button[aria-controls="schedule-form-${teacherId}"]`);

        if (form.classList.contains('hidden')) {
            form.classList.remove('hidden');
            button.setAttribute('aria-expanded', 'true');
        } else {
            form.classList.add('hidden');
            button.setAttribute('aria-expanded', 'false');
        }

        console.log(`toggleScheduleForm called for teacherId: ${teacherId}`);
    }

    /**
     * Validar el formulario y mostrar los datos enviados en la consola
     * @param {Event} event - Evento del formulario
     * @param {number} teacherId - ID del profesor
     */
    function validateAndLogForm(event, teacherId) {
        event.preventDefault(); // Detener el envío del formulario para depuración

        // Obtener el formulario
        const form = event.target;

        // Capturar los valores del formulario
        const data = {
            teacher_id: teacherId,
            day: form.day.value,
            start_time: form.start_time.value,
            end_time: form.end_time.value,
        };

        console.log(`Form data for teacherId ${teacherId}:`, data);

        // Si todo es válido, enviar el formulario
        form.submit();
    }
</script>
