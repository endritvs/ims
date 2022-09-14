<!doctype html>
<html>


<body>
    <div class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
        @include('components/user')
        @include('includes.head')
        @include('includes.sidebar')

        <div>
            @yield('content')
        </div>
            <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
        </div>
</body>

{{-- <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script> --}}
</html>
