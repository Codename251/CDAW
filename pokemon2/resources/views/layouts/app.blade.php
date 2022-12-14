@extends('template')

@section('content')
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        @livewireStyles
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Scripts -->
        <link rel="stylesheet" href="http://127.0.0.1:8000/css/app.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/css/fight.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/css/styles.css">

        <!--@vite(['resources/css/app.css', 'resources/js/app.js'])-->
    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100" style="padding-top: calc(4rem + 2px)">
            @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
@endsection

@section('script')

	<script src="{{asset('js/scripts.js')}}"></script>
    <script src="{{asset('js/fight.js')}}"></script>
	
@endsection
