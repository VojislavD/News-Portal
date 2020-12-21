<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ config('settings.description_tag') }}">
        <meta name="keywords" content="{{ config('settings.keywords_tag') }}">
        <meta name="author" content="{{ config('settings.author_tag') }}">
        <link rel="icon" type="image/ong" href="{{ asset(config('settings.favicon')) }}">

        <title>{{ config('settings.title') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Custom Styles -->
        <link rel="stylesheet" type="text/css" href="/css/custome.css">

        <!-- Scripts -->
        <script src="{{ mix('js/app.js') }}" defer></script>

        {{-- JQuery --}}
        <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>

        @livewireStyles
    </head>
    <body>
        <x-loading class="w-20 h-20 transform -translate-y-1/2 -translate-x-1/2" />

        <div class="w-full min-h-screen bg-gray-100">
            {{ $slot }}
        </div>


        @livewireScripts
        <script>
            $(window).on('load', function () {
                $('#loading').fadeOut(500);
            });
        </script>
    </body>
</html>
