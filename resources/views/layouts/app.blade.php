<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? 'Portal Berita & Profil Desa Tangkit' }}</title>

    <!-- SEO Meta Tags -->
    <meta name="description" content="{{ $description ?? 'Portal Berita dan Informasi Resmi Desa Tangkit - Suara Warga, Kabar Terbaru' }}">
    <meta name="keywords" content="{{ $keywords ?? 'desa tangkit, berita desa, profil desa, informasi desa, pengumuman desa' }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="{{ $title ?? 'Portal Berita & Profil Desa Tangkit' }}">
    <meta property="og:description" content="{{ $description ?? 'Portal Berita dan Informasi Resmi Desa Tangkit' }}">
    <meta property="og:image" content="{{ $ogImage ?? asset('images/og-image.jpg') }}">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="{{ $title ?? 'Portal Berita & Profil Desa Tangkit' }}">
    <meta property="twitter:description" content="{{ $description ?? 'Portal Berita dan Informasi Resmi Desa Tangkit' }}">
    <meta property="twitter:image" content="{{ $ogImage ?? asset('images/og-image.jpg') }}">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <!-- Additional Styles -->
    @stack('styles')
</head>
<body class="antialiased bg-[var(--color-neutral-light)] text-[var(--color-neutral-dark)]">
    <!-- Header/Navigation -->
    <x-header />

    <!-- Main Content -->
    <main class="min-h-screen">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <x-footer />

    <!-- Scripts -->
    @stack('scripts')
</body>
</html>
