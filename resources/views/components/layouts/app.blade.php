<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'My Website' }}</title>
    @include('sections.header')
</head>

<body>
    {{ $slot }}

     @include('sections.footer')
</body>

</html>