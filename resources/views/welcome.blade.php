<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Event Page</title>

    @vite('resources/css/app.css')
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body class="bg-white text-gray-900">


    <nav class="bg-[#0A1A61] text-white py-3 shadow-md">
        <div class="max-w-7xl mx-auto px-4 flex items-center justify-between">


            <img src="/img/gigstix.png"
            alt="logo"
            class="h-14 md:h-16 w-auto object-contain drop-shadow-lg">



            <ul class="font-[Poppins] hidden md:flex space-x-6 text-sm font-semibold">
                <li><a href="#" class="hover:text-blue-300">Beranda</a></li>
                <li><a href="#tentang" class="hover:text-blue-300">Tentang</a></li>
                <li><a href="#laris" class="hover:text-blue-300">Laris Manis</a></li>
            </ul>

            <!-- LOGIN -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('login') }}" class="font-[Poppins] bg-blue-600 px-4 py-2 rounded-full">
                    Masuk
                </a>
                <a href="{{ route('register-user') }}"
                class="font-[Poppins] bg-white text-blue-600 border border-blue-600 px-4 py-2 rounded-full hover:bg-blue-50 transition">
                    Daftar
                </a>
            </div>
        </div>
    </nav>


 <div class="max-w-7xl mx-auto mt-6 px-4 relative">


    <button
        onclick="this.nextElementSibling.scrollBy({ left: -400, behavior: 'smooth' })"
        class="absolute left-2 top-1/2 -translate-y-1/2 bg-white shadow w-10 h-10 flex items-center justify-center rounded-full z-10"
    >
        ❮
    </button>

    <div class="flex space-x-4 overflow-x-auto scroll-smooth snap-x snap-mandatory rounded-xl scrollbar-hide">

        <img src="/img/kir.jpg"
            class="w-full max-w-xl h-64 object-cover rounded-xl snap-center flex-shrink-0">

        <img src="/img/metalica.jpg"
            class="w-full max-w-xl h-64 object-cover rounded-xl snap-center flex-shrink-0">

        <img src="/img/slipknot.jpg"
            class="w-full max-w-xl h-64 object-cover rounded-xl snap-center flex-shrink-0">

    </div>
    <button
        onclick="this.previousElementSibling.scrollBy({ left: 400, behavior: 'smooth' })"
        class="absolute right-2 top-1/2 -translate-y-1/2 bg-white shadow w-10 h-10 flex items-center justify-center rounded-full z-10"
    >
        ❯
    </button>

</div>


   <section class="max-w-7xl mx-auto mt-12 px-4">
    <h2 class="text-2xl font-bold mb-6">Rekomendasi Event</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

    <!-- CARD 1 -->
    <div class="border rounded-xl shadow-sm hover:shadow-lg transition p-4 bg-white">
        <div class="h-40 bg-gray-100 rounded-lg mb-4 overflow-hidden">
            <img src="/img/blackheart.jpeg" class="w-full h-full object-cover" alt="">
        </div>
        <h3 class="font-semibold text-lg mb-2">Blackheart Festival</h3>
        <p class="text-sm text-gray-600 mb-1">📅 21 November 2025</p>
        <p class="font-bold text-black mb-4">Rp100.000</p>
        <p class="text-sm text-gray-700">Organized by EventOrg</p>

        <!-- TOMBOL BELI -->
        <a href="{{ route('register-user') }}"
           class="block text-center mt-3 bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
            Beli Tiket
        </a>
    </div>

    <!-- CARD 2 -->
    <div class="border rounded-xl shadow-sm hover:shadow-lg transition p-4 bg-white">
        <div class="h-40 bg-gray-100 rounded-lg mb-4 overflow-hidden">
            <img src="/img/slipknot.jpg" class="w-full h-full object-cover" alt="">
        </div>
        <h3 class="font-semibold text-lg mb-2">Indie Night</h3>
        <p class="text-sm text-gray-600 mb-1">📅 10 Desember 2025</p>
        <p class="font-bold text-black mb-4">Rp75.000</p>
        <p class="text-sm text-gray-700">Organized by MusicWave</p>

        <!-- TOMBOL BELI -->
        <a href="{{ route('register-user') }}"
           class="block text-center mt-3 bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
            Beli Tiket
        </a>
    </div>

    <!-- CARD 3 -->
    <div class="border rounded-xl shadow-sm hover:shadow-lg transition p-4 bg-white">
        <div class="h-40 bg-gray-100 rounded-lg mb-4 overflow-hidden">
            <img src="/img/dewa.jpeg" class="w-full h-full object-cover" alt="">
        </div>
        <h3 class="font-semibold text-lg mb-2">Metal Blast</h3>
        <p class="text-sm text-gray-600 mb-1">📅 30 Januari 2026</p>
        <p class="font-bold text-black mb-4">Rp150.000</p>
        <p class="text-sm text-gray-700">Organized by NightCorp</p>

        <!-- TOMBOL BELI -->
        <a href="{{ route('register-user') }}"
           class="block text-center mt-3 bg-blue-600 text-white py-2 rounded-lg font-semibold hover:bg-blue-700 transition">
            Beli Tiket
        </a>
    </div>

</div>

</section>

<section id="laris" class="mt-16 bg-[#0A1A61] py-14 text-white text-center">
    <h2 class="text-3xl font-bold mb-3">Laris Manis</h2>
    <p class="mb-10 opacity-90 font-[Poppins]">Kumpulan event-event laris manis yang mungkin kamu sukai</p>

    <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 px-4">

        <!-- Card 1 -->
        <div class="bg-white text-black rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition transform duration-300">
            <div class="h-52 bg-gray-200 overflow-hidden">
                <img src="/img/blackheart.jpeg" class="w-full h-full object-cover" alt="">
            </div>
            <div class="p-5">
                <h3 class="font-semibold text-lg">Music Fest Summer</h3>
                <p class="text-sm text-gray-500 mt-1">Organized by SonicWave</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white text-black rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition transform duration-300">
            <div class="h-52 bg-gray-200 overflow-hidden">
                <img src="/img/greenday.jpeg" class="w-full h-full object-cover" alt="">
            </div>
            <div class="p-5">
                <h3 class="font-semibold text-lg">Greenday</h3>
                <p class="text-sm text-gray-500 mt-1">Organized by BlueMoon Events</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white text-black rounded-2xl shadow-lg overflow-hidden hover:scale-105 transition transform duration-300">
            <div class="h-52 bg-gray-200 overflow-hidden">
                <img src="/img/dewa.jpeg" class="w-full h-full object-cover" alt="">
            </div>
            <div class="p-5">
                <h3 class="font-semibold text-lg">Intimate Concert</h3>
                <p class="text-sm text-gray-500 mt-1">Organized by RockMasters</p>
            </div>
        </div>

    </div>
</section>


<section id="tentang" class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 mt-10">

    <!-- Banner -->
    <div class="rounded-xl overflow-hidden mb-10">
        <img src="/img/tentangkami.png"
            alt="Welcome to Gigstix"
            class="w-full h-52 md:h-64 lg:h-80 object-cover">
    </div>

    <!-- Tentang Kami -->
    <div class="bg-white rounded-xl p-6 md:p-12">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-14 items-center">

            <!-- Teks -->
            <div>
                <h1 class="text-3xl md:text-4xl font-bold text-[#0A1A61] leading-tight">
                    Tentang <span class="text-blue-600">Gigstix</span>
                </h1>

                <p class="font-[Poppins] mt-5 text-gray-600 leading-relaxed text-lg">
                    Gigstix adalah platform penjualan tiket modern untuk konser dan festival. Kami hadir untuk
                    memberikan pengalaman pembelian tiket yang cepat, aman, dan nyaman.
                </p>

                <p class="font-[Poppins] mt-4 text-gray-600 leading-relaxed text-lg">
                    Dengan teknologi yang terus berkembang, Gigstix berkomitmen menghadirkan
                    kemudahan bagi pencinta event serta mendukung penyelenggara dalam
                    menciptakan acara yang sukses.
                </p>
            </div>

            <!-- Keunggulan / Highlights -->
            <div class="grid grid-cols-1 gap-6">

                <div class="p-6 bg-blue-800 text-white rounded-2xl shadow-md hover:shadow-lg transition transform duration-300">
                    <h3 class="text-2xl font-semibold mb-2">Kemudahan Pembelian</h3>
                    <p class="text-gray-100 leading-relaxed">
                        Sistem pemesanan cepat dan aman, didukung QR code digital, memudahkan akses ke setiap event.
                    </p>
                </div>

                <div class="p-6 bg-blue-600 text-white rounded-2xl shadow-md hover:shadow-lg transition transform duration-300">
                    <h3 class="text-2xl font-semibold mb-2">Pengalaman</h3>
                    <p class="text-gray-100 leading-relaxed">
                        Nikmati kenyamanan maksimal di setiap event dengan tiket resmi dan akses cepat.
                    </p>
                </div>

            </div>

        </div>
    </div>

</section>




</body>
</html>
