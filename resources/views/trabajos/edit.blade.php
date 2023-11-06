@section('title', 'Editar trabajo')
@section('breadcrumbs')
<li aria-current="page">
    <a href="{{ route('trabajos') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 9 4-4-4-4" />
        </svg>
        <span class="ml-1 text-sm font-medium md:ml-2 ">Trabajos</span>
    </a>
</li>
<li aria-current="page">
    <div class="flex items-center">
        <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
            fill="none" viewBox="0 0 6 10">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 9 4-4-4-4" />
        </svg>
        <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-white">Editar</span>
    </div>
</li>
@endsection
<x-app-layout>
    <div>
        <div
            class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Editar trabajo</h1>

            </div>
            <div class="relative overflow-x-auto  sm:rounded-lg">
                <form action="{{ route('trabajos.update', $trabajo->id) }}" method="POST" novalidate>
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 px-4">
                        <div>
                            <label for="title"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                            <input type="text" name="title" id="title"
                                value="{{ old('title') ?? $trabajo->title }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('title') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Titulo del trabajo" required="">
                            @error('title')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="empresa"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Institución</label>
                            <input type="text" name="empresa" id="empresa"
                                value="{{ old('empresa') ?? $trabajo->empresa }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('empresa') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nombre de la institución" required="">
                            @error('empresa')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="descripcion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="8"
                                class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 {{ $errors->has('descripcion') ? 'dark:border-red-700 border-red-700' : '' }} focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Descripción del trabajo">{{ old('descripcion') ?? $trabajo->descripcion }}</textarea>
                            @error('descripcion')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="duracion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Duración</label>
                            <input type="text" name="duracion" id="duracion"
                                value="{{ old('duracion') ?? $trabajo->duracion }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('duracion') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Duración del trabajo" required="">
                            @error('duracion')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="w-full">
                            <label for="fecha_desde_hasta"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Desde -
                                Hasta</label>
                            <input type="text" name="fecha_desde_hasta" id="fecha_desde_hasta"
                                value="{{ old('fecha_desde_hasta') ?? $trabajo->fecha_desde_hasta }}"
                                class="bg-gray-50 border border-gray-300  {{ $errors->has('fecha_desde_hasta') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Desde cuando - hasta cuando el trabajo" required="">
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
                                        class="w-4 h-4 border-gray-300 cursor-pointer dark:focus:bg-blue-600 {{ $errors->has('actual') ? 'dark:border-red-700 border-red-700' : '' }} dark:bg-gray-700 dark:border-gray-600"
                                        @if (old('actual') || old('actual') === '1' || $trabajo->actual === 1) checked @endif>
                                    <label for="si"
                                        class="block ml-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-gray-300">
                                        Si
                                    </label>
                                </div>
                                <div class="flex flex-row items-center mb-4">
                                    <input id="no" type="radio" name="actual" value="0"
                                        class="w-4 h-4 border-gray-300 cursor-pointer dark:focus:bg-blue-600 dark:bg-gray-700 {{ $errors->has('actual') ? 'dark:border-red-700 border-red-700' : '' }} dark:border-gray-600" @if (old('actual') || old('actual') === 0 || $trabajo->actual === 0) checked @endif>
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
                        <a href="{{ route('trabajos') }}"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-500">
                            Volver
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800">
                            Actualizar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
