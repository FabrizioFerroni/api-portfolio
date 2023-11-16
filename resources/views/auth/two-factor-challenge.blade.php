@section('title', __('Two-factor Confirmation'))
<x-guest-layout>
    {{-- <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <div x-data="{ recovery: false }">
            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-show="! recovery">
                {{ __('Please confirm access to your account by entering the authentication code provided by your authenticator application.') }}
            </div>

            <div class="mb-4 text-sm text-gray-600 dark:text-gray-400" x-cloak x-show="recovery">
                {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
            </div>

            <x-validation-errors class="mb-4" />

            <form method="POST" action="{{ route('two-factor.login') }}">
                @csrf

                <div class="mt-4" x-show="! recovery">
                    <x-label for="code" value="{{ __('Code') }}" />
                    <x-input id="code" class="block mt-1 w-full" type="text" inputmode="numeric" name="code" autofocus x-ref="code" autocomplete="one-time-code" />
                </div>

                <div class="mt-4" x-cloak x-show="recovery">
                    <x-label for="recovery_code" value="{{ __('Recovery Code') }}" />
                    <x-input id="recovery_code" class="block mt-1 w-full" type="text" name="recovery_code" x-ref="recovery_code" autocomplete="one-time-code" />
                </div>

                <div class="flex items-center justify-end mt-4">
                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                                    x-show="! recovery"
                                    x-on:click="
                                        recovery = true;
                                        $nextTick(() => { $refs.recovery_code.focus() })
                                    ">
                        {{ __('Use a recovery code') }}
                    </button>

                    <button type="button" class="text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 underline cursor-pointer"
                                    x-cloak
                                    x-show="recovery"
                                    x-on:click="
                                        recovery = false;
                                        $nextTick(() => { $refs.code.focus() })
                                    ">
                        {{ __('Use an authentication code') }}
                    </button>

                    <x-button class="ms-4">
                        {{ __('Log in') }}
                    </x-button>
                </div>
            </form>
        </div>
    </x-authentication-card> --}}
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-logo-auth />
            <div class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8"
                x-data="{ recovery: false }">
                <div class="flex items-center justify-between">
                    <h1
                        class="mb-1 text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                        Autenticación en 2 pasos
                    </h1>

                    <x-button-darkmode />
                </div>

                <p x-show="! recovery" class="font-light text-gray-500 dark:text-gray-400">
                    Confirme el acceso a su cuenta ingresando el código de autenticación proporcionado por su aplicación
                    de autenticación.
                </p>

                <p x-show="recovery" class="font-light text-gray-500 dark:text-gray-400">
                    Confirme el acceso a su cuenta ingresando uno de sus códigos de recuperación de emergencia.
                </p>


                @if (session('status'))
                    <div class="mt-4 mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- <x-validation-errors class="mt-4 mb-4" /> --}}
                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" method="POST"
                    action="{{ route('two-factor.login') }}">
                    @csrf
                    <div x-show="! recovery">
                        <label for="code"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Code') }}</label>
                        <div class="flex space-x-4">
                            <input type="text"
                                class="text-center bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-8 md:w-12 h-[41.6px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="digit1" autofocus>
                            <input type="text"
                                class="text-center bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-8 md:w-12 h-[41.6px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="digit2" disabled>
                            <input type="text"
                                class="text-center bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-8 md:w-12 h-[41.6px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="digit3" disabled>
                            <input type="text"
                                class="text-center bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-8 md:w-12 h-[41.6px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="digit4" disabled>
                            <input type="text"
                                class="text-center bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-8 md:w-12 h-[41.6px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="digit5" disabled>
                            <input type="text"
                                class="text-center bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-8 md:w-12 h-[41.6px] p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                id="digit6" disabled>
                        </div>
                        <input id="code"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Código" type="hidden" inputmode="numeric" name="code" autofocus
                            x-ref="code" autocomplete="one-time-code">
                            @error('code')
                                <div class="text-red-500 pt-1 pl-0">{{ $message }}</div>
                            @enderror
                    </div>

                    <div x-cloak x-show="recovery">
                        <label for="recovery_code"
                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">{{ __('Code') }}</label>

                            <input id="recovery_code"
                            class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                placeholder="Código" name="recovery_code" x-ref="recovery_code"
                                autocomplete="one-time-code">
                                @error('code')
                                <div class="text-red-500 pt-2 pl-0">{{ $message }}</div>
                            @enderror
                        {{-- <div class="relative">
                            <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 18">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M5.5 6.5h.01m4.49 0h.01m4.49 0h.01M18 1H2a1 1 0 0 0-1 1v9a1 1 0 0 0 1 1h3v5l5-5h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                                </svg>
                            </div>

                            {{-- <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                required autocomplete="current-password"> --}
                        </div> --}}

                    </div>

                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        <button type="button" x-cloak x-show="recovery"
                            x-on:click="
                             recovery = false;
                             $nextTick(() => { $refs.code.focus() })
                         "
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">{{ __('Use an authentication code') }}</button>
                    </p>

                    <p class="text-sm font-light text-gray-500 dark:text-gray-400">
                        <button type="button" x-show="!recovery"
                            x-on:click="
                            recovery = true;
                            $nextTick(() => { $refs.recovery_code.focus() })
                        "
                            class="font-medium text-primary-600 hover:underline dark:text-primary-500">{{ __('Use a recovery code') }}</button>
                    </p>
                    <button id="submit" type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700  focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 "
                        x-show="!recovery">{{ __('Log in') }}</button>

                    <button id="submit2" type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700  focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 "
                        x-cloak x-show="recovery">{{ __('Log in') }}</button>
                </form>
            </div>
        </div>
    </section>

    @section('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                const digits = Array.from({
                        length: 6
                    }, (_, index) =>
                    document.getElementById(`digit${index + 1}`)
                );
                const inputCode = document.getElementById("code");
                const submitButton = document.getElementById("submit");

                digits.forEach((digit, index) => {
                    digit.addEventListener("input", () => {
                        if (digit.value.length === 1) {
                            if (index < digits.length - 1) {
                                digits[index + 1].removeAttribute("disabled");
                                digits[index + 1].focus();
                            }
                        } else {
                            digit.value = "";
                        }
                    });

                    digit.addEventListener("keydown", (e) => {
                        if (!/[0-9]/.test(e.key) && e.key !== "Backspace") {
                            e.preventDefault();
                        }

                        if (e.key === "Backspace" && digit.value.length === 0) {
                            if (index > 0) {
                                digits[index - 1].focus();
                            }
                        }

                        if (e.key === "Tab" && index < digits.length - 1) {
                            e.preventDefault();
                            digits[index + 1].focus();
                        }

                        if (e.key === "Tab" && index === digits.length - 1) {
                            e.preventDefault();
                            submitButton.focus();
                        }

                        if (e.shiftKey && e.key === "Tab" && index > 0) {
                            e.preventDefault();
                            digits[index - 1].focus();
                        }

                        if (e.shiftKey && e.key === "Tab" && index === 0) {
                            e.preventDefault();
                            digits[index].focus();
                        }

                        if (e.key === "Enter" && index === digits.length - 1) {
                            e.preventDefault();
                            submitButton.click();
                        }
                    });
                });

                submitButton.addEventListener("click", () => {
                    const code = Array.from(digits)
                        .map((digit) => digit.value)
                        .join("");

                    if (code.length === 6) {
                        inputCode.value = code;
                    } else {
                        alert("El código de doble factor debe tener 6 dígitos.");
                    }
                });
            });
        </script>
    @endsection
</x-guest-layout>
