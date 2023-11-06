@section('title', 'Agregar estudio')
<x-app-layout>
    <div>
        <x-fabrizio-dev.breadcrumbs nombre="Estudios" />
        <div
            class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Agregar nuveo estudio</h1>

            </div>
            <div class="relative overflow-x-auto  sm:rounded-lg">
                <form action="{{ route('estudios.store') }}" method="POST" novalidate>
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 px-4">
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                            <input type="text" name="title" id="title" value="{{ old('title') ?? '' }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('title') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Titulo del estudio" required="">
                            @error('title')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="institucion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institución</label>
                            <input type="text" name="institucion" id="institucion"
                                value="{{ old('institucion') ?? '' }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('institucion') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nombre de la institución" required="">
                            @error('institucion')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="descripcion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="8"
                                class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 {{ $errors->has('descripcion') ? 'dark:border-red-700 border-red-700' : '' }} focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Descripción del estudio">{{ old('descripcion') ?? '' }}</textarea>
                            @error('descripcion')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="duracion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duración</label>
                            <input type="text" name="duracion" id="duracion" value="{{ old('duracion') ?? '' }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('duracion') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Duración del estudio" required="">
                            @error('duracion')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="fecha_desde_hasta"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desde -
                                Hasta</label>
                            <input type="text" name="fecha_desde_hasta" id="fecha_desde_hasta"
                                value="{{ old('fecha_desde_hasta') ?? '' }}"
                                class="bg-gray-50 border border-gray-300  {{ $errors->has('fecha_desde_hasta') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Desde cuando - hasta cuando el estudio" required="">
                            @error('fecha_desde_hasta')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="flex flex-col">
                            <label
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">¿Actual?</label>
                            <div class="flex flex-row gap-4">
                                <div class="flex flex-row items-center mb-4">
                                    <input id="si" type="radio" name="actual" value="1"
                                        class="w-4 h-4 border-gray-300 cursor-pointer dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 {{ $errors->has('actual') ? 'dark:border-red-700 border-red-700' : '' }}"
                                        @if (old('actual') || old('actual') === 1) checked @endif>
                                    <label for="si"
                                        class="block ml-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-gray-300">
                                        Si
                                    </label>
                                </div>
                                <div class="flex flex-row items-center mb-4">
                                    <input id="no" type="radio" name="actual" value="0"
                                        class="w-4 h-4 border-gray-300 cursor-pointer dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 {{ $errors->has('actual') ? 'dark:border-red-700 border-red-700' : '' }}" checked @if (old('actual') || old('actual') === 0 || '' ) checked @endif>
                                    <label for="no"
                                        class="block ml-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-gray-300"
                                        >
                                        No
                                    </label>
                                </div>
                            </div>

                            @error('actual')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>


                    </div>
                    <div class="flex flex-col md:flex-row justify-between">
                        <a href="{{ route('estudios') }}"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-500">
                            Volver
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800">
                            Crear
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
