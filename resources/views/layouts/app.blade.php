<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hexlet Blog - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />      
<!--        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <script src="{{ asset('public/js/app.js') }}"></script>   --!>
        @vite('resources/js/app.js')
    </head>
    <body>
        <div class="menu">
            <a href="{{ route('about') }}">About</a>
            <a href="{{ route('articles.index') }}">Articles</a>
        </div>

            <a href="{{ route('articles.create') }}">Create article</a>
       <div class="container mt-4">
            <h1>Layout header</h1>
            <div>
                @yield('content')
            </div>
        </div>
    </body>
</html>
