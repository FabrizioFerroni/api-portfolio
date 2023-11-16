<x-guest-layout>
    <section class="bg-gray-50 dark:bg-gray-900">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto md:h-screen lg:py-0">
            <x-logo-auth />
            <div
                class="w-full p-6 bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md dark:bg-gray-800 dark:border-gray-700 sm:p-8">
                <x-button-darkmode />
                <p class="font-light text-gray-500 dark:text-gray-400">{{ __('Before continuing, could you verify your
                    email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we
                    will gladly send you another.') }}</p>

                @if (session('status') == 'verification-link-sent')
                <div class="mb-4 font-medium text-sm text-green-600 dark:text-green-400">
                    {{ __('A new verification link has been sent to the email address you provided in your profile
                    settings.') }}
                </div>
                @endif

                <x-validation-errors class="mt-4 mb-4" />
                <form class="mt-4 space-y-4 lg:mt-5 md:space-y-5" method="POST"
                    action="{{ route('verification.send') }}">
                    @csrf
                    <button type="submit"
                        class="w-full text-white bg-primary-600 hover:bg-primary-700  focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-primary-600 dark:hover:bg-primary-700 ">
                        {{ __('Resend Verification Email') }}</button>
                </form>
            </div>
        </div>
    </section>
</x-guest-layout>
