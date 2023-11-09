@section('title', 'Proyectos')
@section('breadcrumbs')
    <li aria-current="page">
        <div class="flex items-center">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4" />
            </svg>
            <span class="ml-1 text-sm font-medium text-gray-900 md:ml-2 dark:text-white">Proyectos</span>
        </div>
    </li>
@endsection
<x-app-layout>
    <div>
        <div
            class="block max-w p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700">
            <div class="mb-6 flex items-center justify-between">
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Proyectos</h1>
                <a href="{{ route('proyectos.create') }}"
                    class="focus:outline-none text-white bg-green-700 hover:bg-green-800  focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Añadir
                    nuevo</a>
            </div>
            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 ">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                Titulo / Links
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Descripcion
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Lenguajes (Tags)
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Privacidad del repositorio
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Estado del proyecto
                            </th>
                            <th scope="col" class="px-4 py-3 text-center">
                                Acciones
                            </th>
                        </tr>
                    </thead>
                    <tbody id="user-table-body">
                        @forelse ($proyectos as $proyecto)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 align-middle">
                                <td scope="row"
                                    class="flex items-center px-6  py-6 text-gray-900 whitespace-nowrap dark:text-white gap-2">
                                    <img class="w-16 h-16 rounded-md" src="{{ asset($proyecto->imagen) }}"
                                        alt="{{ $proyecto->titulo }}">
                                    <div class="pl-3" style="padding-left: 1rem;">
                                        <div class="text-base font-semibold">{{ $proyecto->titulo }}</div>
                                        <div
                                            class="font-normal text-gray-500 flex flex-row justify-start gap-3 items-center pt-1">
                                            <a href="{{ $proyecto->url_github }}" target="_blank"
                                                class="font-medium group dark:text-blue-500 {{ $proyecto->is_private ? 'disabled cursor-not-allowed pointer-events-none' : '' }}" data-tts="up"
                                                aria-label="Repositorio Github">
                                                <svg class="w-4 h-4 text-gray-600 dark:text-gray-500 group-hover:text-purple-700 dark:group-hover:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                    fill="currentColor" viewBox="0 0 20 20">
                                                    <path fill-rule="evenodd"
                                                        d="M10 .333A9.911 9.911 0 0 0 6.866 19.65c.5.092.678-.215.678-.477 0-.237-.01-1.017-.014-1.845-2.757.6-3.338-1.169-3.338-1.169a2.627 2.627 0 0 0-1.1-1.451c-.9-.615.07-.6.07-.6a2.084 2.084 0 0 1 1.518 1.021 2.11 2.11 0 0 0 2.884.823c.044-.503.268-.973.63-1.325-2.2-.25-4.516-1.1-4.516-4.9A3.832 3.832 0 0 1 4.7 7.068a3.56 3.56 0 0 1 .095-2.623s.832-.266 2.726 1.016a9.409 9.409 0 0 1 4.962 0c1.89-1.282 2.717-1.016 2.717-1.016.366.83.402 1.768.1 2.623a3.827 3.827 0 0 1 1.02 2.659c0 3.807-2.319 4.644-4.525 4.889a2.366 2.366 0 0 1 .673 1.834c0 1.326-.012 2.394-.012 2.72 0 .263.18.572.681.475A9.911 9.911 0 0 0 10 .333Z"
                                                        clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="{{ $proyecto->url_proyecto }}" target="_blank"
                                                class="font-medium group dark:text-blue-500 {{ !$proyecto->is_online ? 'disabled cursor-not-allowed pointer-events-none' : '' }}" data-tts="up"
                                                aria-label="Link Proyecto">
                                                <svg class="w-4 h-4 text-gray-600 dark:text-gray-500 group-hover:text-purple-700 dark:group-hover:text-white"
                                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                    viewBox="0 0 21 20">
                                                    <path stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="2"
                                                        d="M6.487 1.746c0 4.192 3.592 1.66 4.592 5.754 0 .828 1 1.5 2 1.5s2-.672 2-1.5a1.5 1.5 0 0 1 1.5-1.5h1.5m-16.02.471c4.02 2.248 1.776 4.216 4.878 5.645C10.18 13.61 9 19 9 19m9.366-6h-2.287a3 3 0 0 0-3 3v2m6-8a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    {{ Str::limit($proyecto->descripcion, 50, '...') }}</td>
                                <td class="px-6 py-4">
                                    @if (!is_null($proyecto->tags))
                                    <div class="flex flex-col flex-wrap gap-2 justify-start items-start">
                                        @foreach ($proyecto->tags as $tag)
                                                <span
                                                class="bg-green-100 w-full text-center text-green-800 text-xs font-medium mr-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ $tag }}</span>
                                                @endforeach
                                            </div>
                                    @endif
                                </td>
                                <td class="px-6 py-4">
                                    {{ $proyecto->is_private ? 'Privado' : 'Público' }}
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        @if ($proyecto->is_online)
                                            <div class="h-2.5 w-2.5 rounded-full bg-green-500 mr-2"
                                                style="height: 0.625rem; width:0.625rem"></div> En linea
                                        @else
                                            <div class="h-2.5 w-2.5 rounded-full bg-red-500 mr-2"
                                                style="height: 0.625rem; width:0.625rem"></div> Desconectado
                                        @endif
                                    </div>
                                </td>
                                <td class="px-4 py-3">
                                    <div class="flex justify-center items-center">
                                        <a href="{{ route('proyectos.edit', $proyecto->id) }}" data-tts="up" aria-label="Editar"
                                            class="font-medium hover:bg-blue-600 hover:p-4 p-4  rounded-md group dark:text-blue-500 hover:underline mr-6">
                                            <svg class="w-4 h-4 text-blue-600 dark:text-blue-500 group-hover:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path
                                                    d="m13.835 7.578-.005.007-7.137 7.137 2.139 2.138 7.143-7.142-2.14-2.14Zm-10.696 3.59 2.139 2.14 7.138-7.137.007-.005-2.141-2.141-7.143 7.143Zm1.433 4.261L2 12.852.051 18.684a1 1 0 0 0 1.265 1.264L7.147 18l-2.575-2.571Zm14.249-14.25a4.03 4.03 0 0 0-5.693 0L11.7 2.611 17.389 8.3l1.432-1.432a4.029 4.029 0 0 0 0-5.689Z" />
                                            </svg>
                                        </a>
                                        <button type="button" id="proyectoModal-button-{{ $proyecto->id }}"
                                            data-tts="up" aria-label="Eliminar"
                                            data-modal-toggle="proyectoModal-{{ $proyecto->id }}"
                                            class="font-medium dark:disabled:text-red-700 hover:bg-red-600 hover:p-4 p-4 text-red-500 dark:text-red-500
                                            rounded-md group hover:underline">
                                            <svg class="w-4 h-4 'text-red-600 dark:text-red-500 group-hover:text-white"
                                                aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                                viewBox="0 0 18 20">
                                                <path stroke="currentColor" stroke-linecap="round"
                                                    stroke-linejoin="round" stroke-width="2"
                                                    d="M1 5h16M7 8v8m4-8v8M7 1h4a1 1 0 0 1 1 1v3H6V2a1 1 0 0 1 1-1ZM3 5h12v13a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V5Z" />
                                            </svg>
                                        </button>
                                    </div>
                                </td>
                            </tr>


                            {{-- Modal --}}
                            <div id="proyectoModal-{{ $proyecto->id }}" tabindex="-1" aria-hidden="true"
                                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-modal md:h-full">
                                <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                    <!-- Modal content -->
                                    <div
                                        class="relative p-4 text-center bg-white rounded-lg shadow dark:bg-gray-800 sm:p-5">
                                        <button type="button"
                                            class="text-gray-400 absolute top-2.5 right-2.5 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="proyectoModal-{{ $proyecto->id }}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <svg class="text-gray-400 dark:text-gray-500 w-11 h-11 mb-3.5 mx-auto"
                                            aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path fill-rule="evenodd"
                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <p class="mb-4 text-gray-500 dark:text-gray-300">¿Está seguro de que desea
                                            eliminar el proyecto:
                                            <strong>{{ $proyecto->title }}</strong>?
                                        </p>
                                        <div class="flex justify-center items-center space-x-4">
                                            <form action="{{ route('proyectos.destroy', $proyecto->id) }}" method="POST" novalidate>
                                                @csrf
                                                <button type="submit"
                                                    class="py-2 px-3 text-sm font-medium text-center text-white bg-red-600 rounded-lg hover:bg-red-700  focus:outline-none dark:bg-red-500 dark:hover:bg-red-600">
                                                    Sí, estoy seguro
                                                </button>
                                                <button data-modal-toggle="proyectoModal-{{ $proyecto->id }}"
                                                    type="button"
                                                    class="py-2 px-3 text-sm font-medium text-gray-500 bg-white rounded-lg border border-gray-200 hover:bg-gray-100  focus:outline-none  hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600">
                                                    No, cancelar
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- Fin Modal --}}
                        @empty
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 ">
                                <td class="text-center px-6 py-4" colspan="4">No hay proyectos
                                    registrados aún. Crea uno nuevo <a href="{{ route('proyectos.create') }}"
                                        class="text-blue-300">aquí</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            @if ($proyectos->hasPages())
                <div class="px-6 py-4">
                    {{ $proyectos->links() }}
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
