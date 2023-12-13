@section('title', 'Tablero')
<x-app-layout>
    <div class="text-gray-700 dark:text-white body-font">
        <div class="container  mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg hover:bg-gray-600 group">
                        <svg class="text-purple-500 w-12 h-12 mb-3 inline-block" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 5h1v12a2 2 0 0 1-2 2m0 0a2 2 0 0 1-2-2V2a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v15a2 2 0 0 0 2 2h14ZM10 4h2m-2 3h2m-8 3h8m-8 3h8m-8 3h8M4 4h3v3H4V4Z"/>
                          </svg>
                        <h2
                            class="group-hover:text-white title-font font-medium text-3xl text-gray-900 dark:text-white">
                            {{ $ccertificados }}</h2>
                        <a href="{{ route('certificados') }}"
                            class="group-hover:text-white leading-relaxed">Certificados</a>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg hover:bg-gray-600 group">
                        <svg class="text-purple-500 w-12 h-12 mb-3 inline-block" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 8v10a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V8M1 8a1 1 0 0 1 .4-.8l8-5.75a1 1 0 0 1 1.2 0l8 5.75a1 1 0 0 1 .4.8M1 8l8.4 6.05a1 1 0 0 0 1.2 0L19 8" />
                        </svg>
                        <h2
                            class="group-hover:text-white title-font font-medium text-3xl text-gray-900 dark:text-white">
                            {{ $cconsultas }}</h2>
                        <a href="{{ route('contactos') }}" class="group-hover:text-white leading-relaxed">Consultas de
                            la Web</a>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg hover:bg-gray-600 group">
                        <svg class="text-purple-500 w-12 h-12 mb-3 inline-block " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M1 18a.969.969 0 0 0 .933 1h12.134A.97.97 0 0 0 15 18M1 7V5.828a2 2 0 0 1 .586-1.414l2.828-2.828A2 2 0 0 1 5.828 1h8.239A.97.97 0 0 1 15 2v5M6 1v4a1 1 0 0 1-1 1H1m0 9v-5h1.5a1.5 1.5 0 1 1 0 3H1m12 2v-5h2m-2 3h2m-8-3v5h1.375A1.626 1.626 0 0 0 10 13.375v-1.75A1.626 1.626 0 0 0 8.375 10H7Z" />
                        </svg>
                        <h2
                            class="group-hover:text-white title-font font-medium text-3xl text-gray-900 dark:text-white">
                            {{ $ccv }}</h2>
                        <a href="{{ route('cv') }}" class="group-hover:text-white leading-relaxed">CV</a>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg hover:bg-gray-600 group">
                        <svg class="text-purple-500 w-12 h-12 mb-3 inline-block " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 19">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 15h.01M4 12H2a1 1 0 0 0-1 1v4a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1v-4a1 1 0 0 0-1-1h-3M9.5 1v10.93m4-3.93-4 4-4-4" />
                        </svg>
                        <h2
                            class="group-hover:text-white title-font font-medium text-3xl text-gray-900 dark:text-white">
                            {{ $cdescargas }}</h2>
                        <a href="{{ route('downloads') }}" class="group-hover:text-white leading-relaxed">Descargas</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="text-gray-700 dark:text-white body-font">
        <div class="container  mx-auto">
            <div class="flex flex-wrap -m-4 text-center">
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg hover:bg-gray-600 group">
                        <svg class="text-purple-500 w-12 h-12 mb-3 inline-block" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M2 19h16m-8 0V5m0 0a2 2 0 1 0 0-4 2 2 0 0 0 0 4ZM4 8l-2.493 5.649A1 1 0 0 0 2.443 15h3.114a1.001 1.001 0 0 0 .936-1.351L4 8Zm0 0V6m12 2-2.493 5.649A1 1 0 0 0 14.443 15h3.114a1.001 1.001 0 0 0 .936-1.351L16 8Zm0 0V6m-4-2.8c3.073.661 3.467 2.8 6 2.8M2 6c3.359 0 3.192-2.115 6.012-2.793" />
                        </svg>
                        <h2
                            class="group-hover:text-white title-font font-medium text-3xl text-gray-900 dark:text-white">
                            {{ $cestudios }}</h2>
                        <a href="{{ route('estudios') }}" class="group-hover:text-white leading-relaxed">Educación</a>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg hover:bg-gray-600 group">
                        <svg class="text-purple-500 w-12 h-12 mb-3 inline-block" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 4 1 8l4 4m10-8 4 4-4 4M11 1 9 15" />
                        </svg>
                        <h2
                            class="group-hover:text-white title-font font-medium text-3xl text-gray-900 dark:text-white">
                            {{ $cproyectos }}</h2>
                        <a href="{{ route('proyectos') }}" class="group-hover:text-white leading-relaxed">Proyectos</a>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg hover:bg-gray-600 group">
                        <svg class="text-purple-500 w-12 h-12 mb-3 inline-block " aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M5 5h5M5 8h2m6-3h2m-5 3h6m2-7H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                        </svg>
                        <h2
                            class="group-hover:text-white title-font font-medium text-3xl text-gray-900 dark:text-white">
                            {{ $ctestimonios }}</h2>
                        <a href="{{ route('testimonios') }}"
                            class="group-hover:text-white leading-relaxed">Testimonios</a>
                    </div>
                </div>
                <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                    <div class="border-2 border-gray-600 px-4 py-6 rounded-lg hover:bg-gray-600 group">
                        <svg class="text-purple-500 w-12 h-12 mb-3 inline-block" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-width="2"
                                d="M1 10c1.5 1.5 5.25 3 9 3s7.5-1.5 9-3m-9-1h.01M2 19h16a1 1 0 0 0 1-1V6a1 1 0 0 0-1-1H2a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1ZM14 5V3a2 2 0 0 0-2-2H8a2 2 0 0 0-2 2v2h8Z" />
                        </svg>
                        <h2
                            class="title-font group-hover:text-white font-medium text-3xl text-gray-900 dark:text-white">
                            {{ $ctrabajos }}</h2>
                        <a href="{{ route('trabajos') }}" class="leading-relaxed group-hover:text-white">Trabajos</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
