<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.header')
    </head>
    <body>
        Ur authenticated
        <button onclick="location.href='{{ route('signout') }}'">Sign Out</button>
    </body>
</html>