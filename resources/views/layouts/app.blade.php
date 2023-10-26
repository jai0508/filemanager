<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
        <style>
             <style type="text/css">
        .message p{
            border-radius: 10px;
            padding: 10px 20px 10px 8px;
            margin-top: 5px;
            display: inline-block;
            width: auto;
            margin: 0px;
        }
        .message-send p{
            background: #e0e3e6;
            color: #2f2d2d;
        }
        .message-send{
            text-align: right;
            margin-top: 5px;
        }
        .message-receive p{
            background: #435f7a;
            color: #f5f5f5;
        }
        .message-receive{
            margin-top: 5px;
        }

        .scrollable {
            overflow: hidden;
            overflow-y: scroll;
            height: calc(100vh - 25vh);
        }
        .message-input{
            border: none;
            border-radius: 0px;
            background: #f2f2f2;
        }

    </style>


    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')

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
    </body>
</html>
