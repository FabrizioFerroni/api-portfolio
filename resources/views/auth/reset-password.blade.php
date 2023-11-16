@section('title', __('Reset Password'))
<x-guest-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-logo-auth />
            <div
                class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
                <div class="flex items-center justify-between">
                    <h1
                        class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Cambiar la contraseña
                    </h1>

                    <x-button-darkmode />
                </div>
                {{-- <x-validation-errors class="mt-1 mb-4" /> --}}
                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" method="POST" action="{{ route('password.update') }}" novalidate>
                    @csrf
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <div class="hidden">
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{
                            __('Email') }}</label>
                        <input
                        readonly
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="nombre@compania.com" id="email" type="email" name="email"
                            value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nueva
                            contraseña</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border {{ $errors->has('password') ? 'dark:border-red-700 border-red-700' : '' }} border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            required autocomplete="new-password">
                            @error('password')
                            <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                        @enderror
                    </div>
                    <div>
                        <label for="confirm-password"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Confirmar
                            contraseña</label>
                        <input type="password" id="confirm-password" placeholder="••••••••"
                            class="bg-gray-50 border {{ $errors->has('confirm-password') ? 'dark:border-red-700 border-red-700' : '' }} border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            name="password_confirmation" required autocomplete="new-password">
                            @error('confirm-password')
                            <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 ">{{
                        __('Reset Password') }}</button>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
