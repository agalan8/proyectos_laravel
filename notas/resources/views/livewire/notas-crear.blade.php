<div class="py-6">
    <div class="max-w-4xl mx-auto bg-white p-6 rounded-lg shadow-md">

        <!-- Formulario -->
        <form method="POST" action="{{ route('notas.store') }}">
            @csrf
            <div class="grid grid-cols-2 gap-4 mb-4">
                <!-- Input de alumno -->
                <div class="col-span-1">
                    <label for="alumno" class="block text-gray-700 font-medium">Alumno</label>
                    <input wire:model.live="search" id="alumno" type="text" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="Escribe el nombre del alumno">
                    <label for="nota" class="mt-6 block text-gray-700 font-medium">Nota</label>
                    <select id="nota" name="nota" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="" selected disabled>Selecciona un nota</option>
                        @for ($i = 0; $i <= 10; $i++)

                        <option value="{{ $i }}">{{ $i }}</option>

                        @endfor
                    </select>
                </div>

                <!-- Select de asignaturas -->
                <div class="col-span-1">
                    <label for="asignatura" class="block text-gray-700 font-medium">Asignatura</label>
                    <select wire:model.live="asignaturaId" id="asignatura" name="asignatura_id" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="" >Selecciona una asignatura</option>
                        @foreach ($asignaturas as $asignatura)

                        <option value="{{ $asignatura->id }}">{{ $asignatura->denominacion}}</option>

                        @endforeach
                    </select>
                    <label for="trimestre" class="mt-6 block text-gray-700 font-medium">Trimestre</label>
                    <select id="trimestre" name="trimestre" class="mt-1 block w-full px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option value="" selected disabled>Selecciona un trimestre</option>
                        @for ($i = $trimestres; $i > 0; $i--)

                        <option value="{{ $i }}">{{ $i }}</option>

                        @endfor
                    </select>
                </div>
            </div>

            <div class="mb-4">
                <table class="min-w-full text-sm text-left text-gray-500">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-3 text-xs font-medium text-gray-700 uppercase">Nombre del Alumno</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr class="bg-white">
                                <td class="px-6 py-4">{{ $alumno->nombre}} <input type="radio" id="alumno_id" name="alumno_id" value="{{ $alumno->id }}" class="form-radio text-blue-500 focus:ring-blue-500" /></td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Crear
            </button>
        </form>

    </div>
</div>
