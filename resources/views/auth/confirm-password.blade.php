@section('title', 'Confirmar contraseña')
<x-guest-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-logo-auth />
            <div
                class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
                <div class="flex items-center justify-between">
                    <h1
                        class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Confirma tu contraseña
                    </h1>

                    <x-button-darkmode />
                </div>
                <p class="font-light text-gray-500 dark:text-gray-400">
                    Esta es un área segura de la aplicación. Confirme su contraseña antes de continuar.
</p>

                @if (session('status'))
                <div class="mt-4 mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ session('status') }}
                </div>
                @endif
                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" method="POST" action="{{ route('password.confirm') }}" novalidate>
                    @csrf

                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border {{ $errors->has('password') ? 'dark:border-red-700 border-red-700' : '' }} border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required autocomplete="new-password">
                            @error('password')
                            <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700  focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 ">
                        {{ __('Confirm') }}</button>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
