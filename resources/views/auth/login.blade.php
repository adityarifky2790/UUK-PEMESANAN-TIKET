<x-guest-layout>

    <!-- FULL PAGE WRAPPER -->
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-[#0A1A61] to-[#132E8A] px-4 py-10">

        <!-- CARD FORM -->
        <div class="w-full max-w-md bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 p-8">

            <!-- TITLE -->
            <h1 class="text-center text-3xl font-bold text-white mb-6 tracking-wide">
                Masuk ke <span class="text-blue-300">Gigstix</span>
            </h1>

            <!-- SESSION STATUS -->
            <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

            <!-- FORM -->
            <form method="POST" action="{{ route('login') }}">
                @csrf

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-white" />
                    <x-text-input id="email" class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300 focus:ring-blue-400" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2 text-red-300" />
                </div>

                <!-- Password -->
                <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" class="text-white" />
                    <x-text-input id="password" class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300 focus:ring-blue-400"
                        type="password" name="password" required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-300" />
                </div>

                <!-- ACTION -->
                <div class="flex items-center justify-between mt-6">
                    <x-primary-button class="ms-3 bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg">
                        {{ __('Log in') }}
                    </x-primary-button>
                </div>

            </form>

        </div>

    </div>

</x-guest-layout>
