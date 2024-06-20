<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
      x-data="{ isDarkMode: localStorage.getItem('dark') === 'true' }"
      x-init="$watch('isDarkMode', val => localStorage.setItem('dark', val))"
      x-bind:class="{'dark': isDarkMode}">
    <head>
        @include('components.partials.favicon')
        <title>{{config('app.name')}}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        {{$slot}}
    </body>
</html>
