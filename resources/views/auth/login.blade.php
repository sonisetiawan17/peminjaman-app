<x-guest-layout>
    <x-auth-card>
        <div class="font-extrabold text-center text-2xl mt-5 mb-10">
            <h1>Masuk</h1>
        </div>

        <!-- Session Status -->
        <x-auth-session-status class="mb-4" :status="session('status')" />

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <!-- Email Address -->
            <div>
                <x-label for="email" :value="__('Email')" />

                <input id="email" class="mt-1 block w-full border-gray-300 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md shadow-sm" type="email" name="email" :value="old('email')"  autofocus />
            </div>

            <!-- Password -->
            <div class="mt-4 relative">
                <x-label for="password" :value="__('Kata Sandi')" />

                <input id="password" class="mt-1 block w-full border-gray-300 focus:border-primary focus:ring-primary focus:ring-opacity-50 rounded-md shadow-sm ring-0 pl-10" type="password" name="password" autocomplete="current-password" />

                <div class="absolute top-[34px] left-3 cursor-pointer" id="div">
                    <i class="fa-regular fa-eye-slash text-neutral-500" id="icon"></i>
                </div>
            </div>

            <!-- Remember Me -->
            <div class="flex items-center justify-between mt-4">
                <label for="remember_me" class="inline-flex items-center">
                    <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Ingat saya') }}</span>
                </label>

                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Lupa password?') }}
                    </a>
                @endif
            </div>

            {{-- Log In Button --}}
            <div class="mt-8">
                <button id="button" class="w-full py-2 bg-slate-900/10 text-black/50 rounded-lg cursor-not-allowed">Log In</button>
            </div>

            <div class="mt-4 text-sm text-center">
                <p>
                    Belum punya akun?
                    <a href="{{ route('register') }}">
                        <span class="text-primary underline">
                            Daftar
                        </span>
                    </a>
                </p>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>

<script src="{{ asset('js/auth/login-script.js') }}"></script>

