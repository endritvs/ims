<!doctype html>
<html class="h-full">
    <head>
       @include('includes.head')
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    </head>
    <body class="h-full">
        <div class="w-full flex h-full">
            @include("includes.sidebar")
            <div class="w-full flex justify-center items-center px-8 bg-gray-200">
                @yield('content')
            </div>
        </div>
        <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    </body>
</html>
