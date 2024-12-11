@php
    use App\Models\Asignatura;
    use App\Models\Evaluacion;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $alumno->nombre }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Asignaturas
                                    </th>
                                @php
                                // Devulve una coleccion de colecciones donde cada coleccion son las notas de una asignatura
                                    $notasEvaluacion = $alumno->notas->groupBy('evaluacion_id')->all()
                                @endphp
                                    @foreach ($notasEvaluacion as $evaluacionId => $notas)
                                    @php
                                        $evaluacion = Evaluacion::find($evaluacionId);
                                    @endphp
                                    <th scope="col" class="px-6 py-3">
                                        {{ $evaluacion->evaluacion }}
                                    </th>

                                    @endforeach
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @php
                                    dd($notasAsignatura);
                                @endphp --}}
                                {{-- Por cada coleccion en notasAsignaturas $asignaturaId es el id de la asignatura y $notas es la coleccion con las notas de esa asignatura --}}
                                @php
                                // Devulve una coleccion de colecciones donde cada coleccion son las notas de una asignatura
                                    $notasAsignatura = $alumno->notas->groupBy('asignatura_id')->all()
                                @endphp
                                @foreach ($notasAsignatura as $asignaturaId => $notas)
                                    @php
                                        $asignatura = Asignatura::find($asignaturaId);
                                    @endphp
                                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                        <td class="px-6 py-4">
                                            {{ $asignatura->codigo }}
                                        </td>
                                        @foreach ($notas as $nota)
                                        <td class="px-6 py-4">
                                            {{ $nota->nota }}
                                        </td>
                                        @endforeach
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>


    </div>
</x-app-layout>
