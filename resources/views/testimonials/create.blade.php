@section('title', 'Agregar testimonio')
@section('breadcrumbs')
    <li aria-current="page">
        <a href="{{ route('testimonios') }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="ml-1 text-sm font-medium md:ml-2 ">Testimonios</span>
        </a>
    </li>
    <li aria-current="page">
        <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-white">Agregar</span>
        </div>
    </li>
@endsection
<x-app-layout>
    <div>
        <div
            class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Agregar nuevo testimonio
                </h1>

            </div>
            <div class="relative overflow-x-auto  sm:rounded-lg">
                {{-- aqui va el form --}}
                <form action="{{ route('testimonios.create') }}" method="POST" novalidate enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 px-4">
                        <div>
                            <label for="cliente"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cliente</label>
                            <input type="text" name="cliente" id="cliente" value="{{ old('cliente') ?? '' }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('cliente') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nombre del cliente" required="">
                            @error('cliente')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="cargo"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Cargo</label>
                            <input type="text" name="cargo" id="cargo" value="{{ old('cargo') ?? '' }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('cargo') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nombre del cargo" required="">
                            @error('cargo')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="descripcion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="8"
                                class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 {{ $errors->has('descripcion') ? 'dark:border-red-700 border-red-700' : '' }} focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Descripción del testimonio">{{ old('descripcion') ?? '' }}</textarea>
                            @error('descripcion')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-2 ">
                            <div>
                                <span
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Imagen</span>
                            </div>
                            <div class="flex flex-col justify-start items-start">
                                <img src="{{ asset('img/testimonios/default.jpg') }}"
                                    class="rounded-lg w-screen h-96" alt="Imagen testimonio" id="preview_img">
                            </div>
                            <input
                                class="hidden w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400"
                                aria-describedby="file_input_help" name="imagen" id="file_input" type="file"
                                accept="image/*">
                            <label
                                class="cursor-pointer inline-flex items-center px-5 py-2.5 mt-4 sm:mt-6 text-sm font-medium text-center text-white bg-purple-700 rounded-lg hover:bg-purple-800"
                                for="file_input">Subir imagen</label>
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG
                                or GIF (MAX. 800x400px).</p>
                            @error('imagen')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between px-4">
                        <a href="{{ route('testimonios') }}"
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
    @section('scripts')
        <script>
            const inputFile = document.getElementById('file_input');
            const imgFile = document.getElementById('preview_img');
            const defaultFile = "{{ asset('img/testimonios/default.jpg') }}";
            inputFile.addEventListener('change', (e) => {
                const file = e.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        imgFile.src = event.target.result;
                    };
                    reader.readAsDataURL(file);
                } else {
                    imgFile.src = defaultFile;
                }
            })
        </script>
    @endsection
</x-app-layout>
