<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    @vite('resources/css/app.scss')
    <link rel="icon" href="{{ asset('storage/images/favicon.ico') }}"/>
    @vite('resources/js/app.js')
    <script src="{{ asset('js/updatePreview.js') }} "></script>

    <title>Case Study</title>
</head>
<body class="mb-48">
@include('elements.header')

@yield('content')

@include('elements.footer')
<x-flash-message/>
</body>
</html>
