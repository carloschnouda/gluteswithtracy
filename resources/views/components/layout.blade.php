<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        @if (isset($seo_page))
            <!-- Primary Meta Tags -->
            <title>{{ $seo_page->title }} </title>
            <meta name="title" content="{{ $seo_page->title }}">
            <meta name="description" content="{{ $seo_page->description }}">

            <!-- Open Graph / Facebook -->
            <meta property="og:type" content="website">
            <meta property="og:url" content="{{ url()->current() }}">
            <meta property="og:title" content="{{ $seo_page->title }}">
            <meta property="og:description" content="{{ $seo_page->description }}">
            <meta property="og:image" content="{{ Storage::url($seo_page->image) }}">

            <!-- Twitter -->
            <meta property="twitter:card" content="summary_large_image">
            <meta property="twitter:url" content="{{ url()->current() }}">
            <meta property="twitter:title" content="{{ $seo_page->title }}">
            <meta property="twitter:description" content="{{ $seo_page->description }}">
            <meta property="twitter:image" content="{{ Storage::url($seo_page->image) }}">
        @else
            <title>404 | Glutes With Tracy </title>
        @endif

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap"
            rel="stylesheet">

        <!-- Styles -->
        <script src="https://cdn.tailwindcss.com"></script>
        <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

        <!-- Favicon -->
        <link rel="icon" type="image/png" href="/favicon-48x48.png" sizes="48x48" />
        <link rel="icon" type="image/svg+xml" href="/favicon.svg" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
        <meta name="apple-mobile-web-app-title" content="GlutesWithTracy" />
        <link rel="manifest" href="/site.webmanifest" />

        <!-- Google tag (gtag.js) -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=G-0QNMS1NG9H"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());

          gtag('config', 'G-0QNMS1NG9H');
        </script>

    </head>

    <body>

        @if (Session::has('error'))
            <x-toast-danger>

                {{ Session::get('error') }}

            </x-toast-danger>
        @endif

        @if (Session::has('success'))
            <x-toast-success>
                {{ Session::get('success') }}
            </x-toast-success>
        @endif

        {{ $slot }}

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="{{ asset('assets/js/main.js') }}"></script>
    </body>

</html>
