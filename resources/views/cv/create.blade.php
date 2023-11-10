@section('title', 'Subir curriculum Vitae')
@section('breadcrumbs')
    <li aria-current="page">
        <a href="{{ route('cv') }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="ml-1 text-sm font-medium md:ml-2 ">Curriculums Vitae</span>
        </a>
    </li>
    <li aria-current="page">
        <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-white">Subir</span>
        </div>
    </li>
@endsection
<x-app-layout>
    <div>
        <div
            class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white px-4">Subir nuevo curriculum vitae
                </h1>

            </div>
            <div class="relative overflow-x-auto  sm:rounded-lg">
                {{-- aqui va el form --}}
                <form action="{{ route('cv.store') }}" novalidate method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 px-4">
                        <div class="sm:col-span-2">
                            <label for="nombre"
                                class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre</label>
                            <input type="text" name="nombre" id="nombre" value="{{ old('nombre') ?? '' }}"
                                class="capitalize bg-gray-50 border border-gray-300 {{ $errors->has('nombre') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nombre del curriculum vitae" required="">
                            @error('nombre')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"
                                for="cv">Curriculum Vitae (cv)</label>
                            <input
                                class="block {{ $errors->has('cv') ? 'dark:border-red-700 border-red-700' : '' }} w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                id="cv" name="cv" type="file" accept="application/pdf">

                                @error('cv')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <div class="flex flex-col">
                                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">¿Es actual?</label>
                                <div class="flex flex-row gap-4">
                                    <div class="flex flex-row items-center mb-4">
                                        <input id="si_online" type="radio" name="actual" value="1"
                                            class="w-4 h-4 border-gray-300 cursor-pointer dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 {{ $errors->has('actual') ? 'dark:border-red-700 border-red-700' : '' }}"
                                            @if (old('actual') || old('actual') === 1) checked @endif>
                                        <label for="si_online"
                                            class="block ml-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-gray-300">
                                            Si
                                        </label>
                                    </div>
                                    <div class="flex flex-row items-center mb-4">
                                        <input id="no_online" type="radio" name="actual" value="0"
                                            class="w-4 h-4 border-gray-300 cursor-pointer dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 {{ $errors->has('actual') ? 'dark:border-red-700 border-red-700' : '' }}"
                                            checked @if (old('actual') || old('actual') === 0 || '') checked @endif>
                                        <label for="no_online"
                                            class="block ml-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-gray-300">
                                            No
                                        </label>
                                    </div>
                                </div>

                                @error('actual')
                                    <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between px-4">
                        <a href="{{ route('cv') }}"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-gray-700 rounded-lg hover:bg-gray-500">
                            Volver
                        </a>
                        <button type="submit"
                            class="inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-green-800">
                            Subir
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
