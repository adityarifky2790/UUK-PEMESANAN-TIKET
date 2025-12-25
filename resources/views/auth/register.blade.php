<x-guest-layout>
    <div class="min-h-screen flex items-center justify-center bg-gradient-to-b from-[#0A1A61] to-[#132E8A] px-4 py-10">

        <!-- CARD FORM -->
        <div class="w-full max-w-md bg-white/10 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/20 p-8">

            <!-- TITLE -->
            <h1 class="text-center text-3xl font-bold text-white mb-6 tracking-wide">
                Daftarkan <span class="text-blue-300">Gigstix</span>
            </h1>

            <!-- SESSION STATUS -->
            <x-auth-session-status class="mb-4 text-white" :status="session('status')" />

            <!-- FORM -->
            <form method="POST" action="{{ route('register.store') }}" class="space-y-4">
                @csrf

                <!-- Nama -->
                <div>
                    <x-input-label for="nama" :value="__('Nama Lengkap')" class="text-white" />
                    <x-text-input id="nama"
                        class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300
                        focus:ring-blue-400 focus:outline-none"
                        type="text" name="nama" :value="old('nama')" required autocomplete="name" autofocus />
                    <x-input-error :messages="$errors->get('nama')" class="mt-1 text-red-300 text-sm" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" class="text-white" />
                    <x-text-input id="email"
                        class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300
                        focus:ring-blue-400 focus:outline-none"
                        type="email" name="email" :value="old('email')" required autocomplete="email" />
                    <x-input-error :messages="$errors->get('email')" class="mt-1 text-red-300 text-sm" />
                </div>

                <!-- Role (Hanya untuk admin) -->
                @if(Auth::user()?->role == 'admin')
                <div>
                    <x-input-label for="role" :value="__('Pilih Role')" class="text-white" />

                    <div class="relative mt-1">
                        <select name="role" id="role"
                            class="block w-full appearance-none rounded-lg bg-white/20 border border-white/30 text-white
                            px-4 py-3 focus:ring-2 focus:ring-blue-300 focus:border-blue-300 backdrop-blur-md
                            shadow-lg hover:bg-white/30 transition cursor-pointer">
                            <option value="pelanggan" class="text-black">Pelanggan</option>
                            <option value="petugas" class="text-black">Petugas</option>
                            <option value="admin" class="text-black">Admin</option>
                        </select>

                        <!-- Icon Panah -->
                        <span class="absolute inset-y-0 right-3 flex items-center pointer-events-none text-white/80">
                            ▼
                        </span>
                    </div>

                    <x-input-error :messages="$errors->get('role')" class="mt-1 text-red-300 text-sm" />
                </div>
                @endif

                <!-- No HP -->
                <div>
                    <x-input-label for="no_hp" :value="__('Nomor HP')" class="text-white" />
                    <x-text-input id="no_hp"
                        class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300
                        focus:ring-blue-400 focus:outline-none"
                        type="text" name="no_hp" :value="old('no_hp')" />
                    <x-input-error :messages="$errors->get('no_hp')" class="mt-1 text-red-300 text-sm" />
                </div>

                <!-- Alamat -->
                <div>
                    <x-input-label for="alamat" :value="__('Alamat')" class="text-white" />
                    <textarea id="alamat" name="alamat"
                        class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300
                        focus:ring-blue-400 focus:outline-none"
                        rows="3">{{ old('alamat') }}</textarea>
                    <x-input-error :messages="$errors->get('alamat')" class="mt-1 text-red-300 text-sm" />
                </div>

                <!-- Password -->
                <div>
                    <x-input-label for="password" :value="__('Password')" class="text-white" />
                    <x-text-input id="password"
                        class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300
                        focus:ring-blue-400 focus:outline-none"
                        type="password" name="password" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-1 text-red-300 text-sm" />
                </div>

                <!-- Confirm Password -->
                <div>
                    <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" class="text-white" />
                    <x-text-input id="password_confirmation"
                        class="block mt-1 w-full rounded-lg bg-white/20 border-white/30 text-white placeholder-gray-300
                        focus:ring-blue-400 focus:outline-none"
                        type="password" name="password_confirmation" required autocomplete="new-password" />
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-1 text-red-300 text-sm" />
                </div>

                <!-- ACTION -->
                <div class="flex items-center justify-between mt-4">
                    <a href="{{ route('admin-dashboard') }}"
                        class="bg-white/20 border border-white/30 text-white px-4 py-2 rounded-lg text-sm
                        hover:bg-white/30 transition">
                        Kembali ke Dashboard Admin
                    </a>

                    <x-primary-button class="ms-3 bg-blue-500 hover:bg-blue-600 text-white px-5 py-2 rounded-lg">
                        {{ __('Daftar') }}
                    </x-primary-button>
                </div>

            </form>

        </div>

    </div>
</x-guest-layout>
