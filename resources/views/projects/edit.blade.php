@section('title', 'Editar proyecto')
@section('breadcrumbs')
    <li aria-current="page">
        <a href="{{ route('proyectos') }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="ml-1 text-sm font-medium md:ml-2 ">Proyectos</span>
        </a>
    </li>
    <li aria-current="page">
        <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
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
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Editar proyecto
                </h1>

            </div>
            <div class="relative overflow-x-auto  sm:rounded-lg">
                {{-- aqui va el form --}}
                <form action="{{ route('proyectos.update', $proyecto->id) }}" novalidate method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 px-4">
                        <div class="sm:col-span-2">
                            <label for="titulo"
                                class=" block mb-2 text-sm font-medium text-gray-900 dark:text-white">Titulo</label>
                            <input type="text" name="titulo" id="titulo" value="{{ old('titulo') ?? $proyecto->titulo }}"
                                class="capitalize bg-gray-50 border border-gray-300 {{ $errors->has('titulo') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nombre del proyecto" required="">
                            @error('titulo')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="sm:col-span-2">
                            <label for="descripcion"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                            <textarea id="descripcion" name="descripcion" rows="8"
                                class="resize-none block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 {{ $errors->has('descripcion') ? 'dark:border-red-700 border-red-700' : '' }} focus:ring-primary-500 focus:border-primary-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Descripción del proyecto">{{ old('descripcion') ?? $proyecto->descripcion }}</textarea>
                            @error('descripcion')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        {{-- Imagen --}}
                        <div class="sm:col-span-2 ">
                            <div>
                                <span
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white text-left">Imagen</span>
                            </div>
                            <div class="flex flex-col justify-start items-start">
                                <img src="{{ asset($proyecto->imagen) }}" class="rounded-lg w-screen h-96"
                                    alt="Imagen testimonio" id="preview_img">
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
                        <div>
                            <label for="url_github"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL Github</label>
                            <input type="url" name="url_github" id="url_github"
                                value="{{ old('url_github') ?? $proyecto->url_github }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('url_github') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="URL del repositorio de Github" required="">
                            @error('url_github')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="url_proyecto"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">URL
                                Proyecto</label>
                            <input type="url" name="url_proyecto" id="url_proyecto"
                                value="{{ old('url_proyecto') ?? $proyecto->url_proyecto }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('url_proyecto') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="URL del proyecto en vivo" required="">
                            @error('url_proyecto')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- booleans --}}
                        <div class="flex flex-col">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">¿Tiene
                                repositorio de Github privado?</label>
                            <div class="flex flex-row gap-4">
                                <div class="flex flex-row items-center mb-4">
                                    <input id="si_private" type="radio" name="is_private" value="1"
                                        class="w-4 h-4 border-gray-300 cursor-pointer dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 {{ $errors->has('is_private') ? 'dark:border-red-700 border-red-700' : '' }}"
                                        @if (old('is_private') || old('is_private') === '1' || $proyecto->is_private === 1) checked @endif>
                                    <label for="si_private"
                                        class="block ml-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-gray-300">
                                        Si
                                    </label>
                                </div>
                                <div class="flex flex-row items-center mb-4">
                                    <input id="no_private" type="radio" name="is_private" value="0"
                                        class="w-4 h-4 border-gray-300 cursor-pointer dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 {{ $errors->has('is_private') ? 'dark:border-red-700 border-red-700' : '' }}"
                                        @if (old('is_private') || old('is_private') === '0' || $proyecto->is_private === 0) checked @endif>
                                    <label for="no_private"
                                        class="block ml-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-gray-300">
                                        No
                                    </label>
                                </div>
                            </div>

                            @error('is_private')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="flex flex-col">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">¿Esta
                                publicado?</label>
                            <div class="flex flex-row gap-4">
                                <div class="flex flex-row items-center mb-4">
                                    <input id="si_online" type="radio" name="is_online" value="1"
                                        class="w-4 h-4 border-gray-300 cursor-pointer dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 {{ $errors->has('is_online') ? 'dark:border-red-700 border-red-700' : '' }}"
                                        @if (old('is_online') || old('is_online') === '1' || $proyecto->is_online === 1) checked @endif>
                                    <label for="si_online"
                                        class="block ml-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-gray-300">
                                        Si
                                    </label>
                                </div>
                                <div class="flex flex-row items-center mb-4">
                                    <input id="no_online" type="radio" name="is_online" value="0"
                                        class="w-4 h-4 border-gray-300 cursor-pointer dark:focus:bg-blue-600 dark:bg-gray-700 dark:border-gray-600 {{ $errors->has('is_online') ? 'dark:border-red-700 border-red-700' : '' }}"
                                        @if (old('is_online') || old('is_online') === '0' || $proyecto->is_online === 0) checked @endif>
                                    <label for="no_online"
                                        class="block ml-2 text-sm font-medium text-gray-900 cursor-pointer dark:text-gray-300">
                                        No
                                    </label>
                                </div>
                            </div>

                            @error('is_online')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>


                        <div>
                            <label for="categoria"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Categoría</label>
                            <select id="categoria" name="categoria"
                                class="bg-gray-50 {{ $errors->has('categoria') ? 'dark:border-red-700 border-red-700' : '' }} border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option selected value="" disabled>Elija una
                                    categoria</option>
                                <option value="backend" {{ (old('categoria') ?? $proyecto->categoria) == 'backend' ? 'selected' : '' }}>Backend
                                </option>
                                <option value="frontend" {{ (old('categoria') ?? $proyecto->categoria) == 'frontend' ? 'selected' : '' }}>
                                    Frontend</option>
                                <option value="fullstack" {{ (old('categoria') ?? $proyecto->categoria) == 'fullstack' ? 'selected' : '' }}>
                                    Fullstack</option>
                            </select>

                            @error('categoria')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                        <div>
                            <label for="tags"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Etiquetas</label>
                            <input type="text" id="tags"
                                class="capitalize bg-gray-50 border border-gray-300 {{ $errors->has('tags') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Tecnologias que se aprendieron (Separadas por comas, maxímo 3)"
                                required="" autocomplete="tags">
                            @error('tags')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                            <div class="pt-2" id="tagsDisplay"> </div>
                            <input readonly type="hidden"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('tags') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                name="tags" id="tagsArray" value="">

                        </div>



                    </div>
                    <div class="flex flex-col md:flex-row justify-between px-4">
                        <a href="{{ route('proyectos') }}"
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

    @section('scripts')
        <script>
            const inputFile = document.getElementById('file_input');
            const imgFile = document.getElementById('preview_img');
            const defaultFile = "{{ asset($proyecto->imagen) }}";

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

            document.addEventListener('DOMContentLoaded', function() {
                const inputTags = document.getElementById('tags');
                const tagsDisplay = document.getElementById('tagsDisplay');
                const tagsArrayInput = document.getElementById('tagsArray');
                const maxTags = 3;

                // Inicializa un array con las etiquetas existentes
                let tagsArray = @json($proyecto->tags);

                tagsArray.forEach(tag => {
                    createTag(tag);
                });

                function createTag(tagText) {
                    const tagSpan = document.createElement('span');
                    tagSpan.textContent = tagText;
                    tagSpan.id = `tag-${tagsArray.length + 1}`;

                    // Agregar clases CSS al span
                    tagSpan.classList.add(
                        'cursor-pointer',
                        'bg-green-100',
                        'hover:bg-red-100',
                        'text-green-800',
                        'hover:text-red-800',
                        'text-xs',
                        'font-medium',
                        'mr-2',
                        'px-2.5',
                        'py-0.5',
                        'rounded',
                        'dark:bg-green-900',
                        'dark:hover:bg-red-900',
                        'dark:text-green-300',
                        'dark:hover:text-red-300'
                    );

                    tagsDisplay.appendChild(tagSpan);

                    // Agregar un manejador de eventos de clic para eliminar la etiqueta
                    tagSpan.addEventListener('click', function() {
                        tagsDisplay.removeChild(tagSpan);
                        const tagIndex = tagsArray.indexOf(tagText);
                        if (tagIndex !== -1) {
                            tagsArray.splice(tagIndex, 1);
                            updateTagsArrayInput();
                            inputTags.disabled = false;
                        }
                    });
                }

                // Llena el campo de entrada con las etiquetas existentes
                tagsArrayInput.value = tagsArray.join(', ');
                updateTagsArrayInput();

                inputTags.addEventListener('input', function(event) {
                    if (event.target.value.includes(',')) {
                        const tags = event.target.value.split(',');

                        event.target.value = '';

                        tags.forEach(tag => {
                            const cleanedTag = tag.trim();
                            if (cleanedTag !== '' && tagsArray.length < maxTags) {
                                const capitalizedTag = cleanedTag.replace(/\b\w/g, firstChar =>
                                    firstChar.toUpperCase());

                                createTag(capitalizedTag);

                                tagsArray.push(capitalizedTag);
                                updateTagsArrayInput();

                                if (tagsArray.length === maxTags) {
                                    inputTags.disabled = true;
                                }
                            }
                        });
                    }
                });

                function updateTagsArrayInput() {
                    tagsArrayInput.value = JSON.stringify(tagsArray);

                    if (tagsArray.length === 0) {
                        tagsArrayInput.value = '';
                    }
                }
            });
        </script>
    @endsection
</x-app-layout>
