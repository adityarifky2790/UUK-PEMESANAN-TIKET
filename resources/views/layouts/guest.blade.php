<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Gigstix') }}</title>

    <!-- Fonts & Tailwind -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="min-h-screen antialiased bg-gradient-to-b from-[#0A1A61] to-[#132E8A]">

    <!-- SLOT WRAPPER -->
    <div class="min-h-screen flex flex-col items-center justify-center px-4 py-10">
        
        <!-- Content injected from login.blade.php -->
        {{ $slot }}

    </div>

</body>
</html>
