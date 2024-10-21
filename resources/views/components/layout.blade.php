<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>GlutesWithTracy</title>

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
