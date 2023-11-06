@section('title', 'Editar usuario')
@section('breadcrumbs')
    <li aria-current="page">
        <a href="{{ route('usuarios') }}"
            class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
            <svg class="w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 6 10">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="m1 9 4-4-4-4" />
            </svg>
            <span class="ml-1 text-sm font-medium md:ml-2 ">Usuarios</span>
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
                <h1 class="text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Editar usuario</h1>

            </div>
            <div class="relative overflow-x-auto  sm:rounded-lg">
                <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" novalidate>
                    @csrf
                    <div class="grid gap-4 sm:grid-cols-2 sm:gap-6 px-4">
                        <div>
                            <label for="name"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nombre y
                                apellido</label>
                            <input type="text" name="name" id="name" value="{{ old('name') ?? $usuario->name }}"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('name') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Nombre y apellido del usuario" required="">
                            @error('name')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- email --}}
                        <div>
                            <label for="email"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Correo
                                electrónico</label>
                            <input readonly type="email" name="email" id="email" value="{{ old('email') ?? $usuario->email }}"
                                class="select-none bg-gray-50 border border-gray-300 {{ $errors->has('email') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Correo electrónico del usuario" required="">
                            @error('email')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="password"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                            <input type="password" name="password" id="password"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('password') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Contraseña del usuario" required="">
                            @error('password')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>

                        <div>
                            <label for="password_confirm"
                                class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar
                                contraseña</label>
                            <input type="password" name="password_confirm" id="password_confirm"
                                class="bg-gray-50 border border-gray-300 {{ $errors->has('password_confirm') ? 'dark:border-red-700 border-red-700' : '' }} text-gray-900 text-sm rounded-lg  focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                placeholder="Repita la contraseña del usuario" required="">
                            @error('password_confirm')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="flex flex-col md:flex-row justify-between px-4">
                        <a href="{{ route('usuarios') }}"
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
    </div>
</x-app-layout>
