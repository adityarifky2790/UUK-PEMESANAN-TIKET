<x-guest-layout>

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-[#0A1A61] to-[#132E8A] px-4 py-10">

        <div class="w-full max-w-md bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 p-8">

            <h1 class="text-center text-3xl font-bold text-white mb-6 tracking-wide">
                Daftar ke <span class="text-blue-300">Gigstix</span>
            </h1>

            <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

            <form method="POST" action="{{ route('register-users') }}">
                @csrf

                <div class="mb-1">
                    <x-input-label for="nama" :value="__('Nama')" class="text-white" />
                    <x-text-input id="nama" class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300 focus:ring-blue-400"
                        type="text" name="nama" :value="old('nama')" required autofocus />
                    <x-input-error :messages="$errors->get('nama')" class="mt-2 text-red-300" />
                </div>

                <div class="mt-4">
                    <x-input-label for="email" :value="__('Email')" class="text-white" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300 focus:ring-blue-400"
                        type="email" name="email" :value="old('email')" required />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-white" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300 focus:ring-blue-400"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
                </div>

                <div class="mt-4">
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-white" />
                    <x-text-input id="password_confirmation"
                        class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300 focus:ring-blue-400"
                        type="password" name="password_confirmation" required />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2 text-red-300" />
                </div>

                <div class="flex flex-col items-center justify-center mt-6">

                    <x-primary-button class="bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg">
                        {{ __('Daftar') }}
                    </x-primary-button>

                    <!-- LINK KE LOGIN -->
                    <p class="mt-4 text-sm text-gray-200">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="text-blue-300 hover:underline font-medium">
                            Masuk di sini
                        </a>
                    </p>

                </div>

            </form>

        </div>

    </div>

</x-guest-layout>
