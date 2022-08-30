<!doctype html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/brands.min.css" integrity="sha512-nS1/hdh2b0U8SeA8tlo7QblY6rY6C+MgkZIeRzJQQvMsFfMQFUKp+cgMN2Uuy+OtbQ4RoLMIlO2iF7bIEY3Oyg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/5d54a13ffa.js" crossorigin="anonymous"></script>
</head>
<style>
    /* Compiled dark classes from Tailwind */
    .dark .dark\:divide-gray-700> :not([hidden])~ :not([hidden]) {
        border-color: rgba(55, 65, 81);
    }

    .dark .dark\:bg-gray-50 {
        background-color: rgba(249, 250, 251);
    }

    .dark .dark\:bg-gray-100 {
        background-color: rgba(243, 244, 246);
    }

    .dark .dark\:bg-gray-600 {
        background-color: rgba(75, 85, 99);
    }

    .dark .dark\:bg-gray-700 {
        background-color: rgba(55, 65, 81);
    }

    .dark .dark\:bg-gray-800 {
        background-color: rgba(31, 41, 55);
    }

    .dark .dark\:bg-gray-900 {
        background-color: rgba(17, 24, 39);
    }

    .dark .dark\:bg-red-700 {
        background-color: rgba(185, 28, 28);
    }

    .dark .dark\:bg-green-700 {
        background-color: rgba(4, 120, 87);
    }

    .dark .dark\:hover\:bg-gray-200:hover {
        background-color: rgba(229, 231, 235);
    }

    .dark .dark\:hover\:bg-gray-600:hover {
        background-color: rgba(75, 85, 99);
    }

    .dark .dark\:hover\:bg-gray-700:hover {
        background-color: rgba(55, 65, 81);
    }

    .dark .dark\:hover\:bg-gray-900:hover {
        background-color: rgba(17, 24, 39);
    }

    .dark .dark\:border-gray-100 {
        border-color: rgba(243, 244, 246);
    }

    .dark .dark\:border-gray-400 {
        border-color: rgba(156, 163, 175);
    }

    .dark .dark\:border-gray-500 {
        border-color: rgba(107, 114, 128);
    }

    .dark .dark\:border-gray-600 {
        border-color: rgba(75, 85, 99);
    }

    .dark .dark\:border-gray-700 {
        border-color: rgba(55, 65, 81);
    }

    .dark .dark\:border-gray-900 {
        border-color: rgba(17, 24, 39);
    }

    .dark .dark\:hover\:border-gray-800:hover {
        border-color: rgba(31, 41, 55);
    }

    .dark .dark\:text-white {
        color: rgba(255, 255, 255);
    }

    .dark .dark\:text-gray-50 {
        color: rgba(249, 250, 251);
    }

    .dark .dark\:text-gray-100 {
        color: rgba(243, 244, 246);
    }

    .dark .dark\:text-gray-200 {
        color: rgba(229, 231, 235);
    }

    .dark .dark\:text-gray-400 {
        color: rgba(156, 163, 175);
    }

    .dark .dark\:text-gray-500 {
        color: rgba(107, 114, 128);
    }

    .dark .dark\:text-gray-700 {
        color: rgba(55, 65, 81);
    }

    .dark .dark\:text-gray-800 {
        color: rgba(31, 41, 55);
    }

    .dark .dark\:text-red-100 {
        color: rgba(254, 226, 226);
    }

    .dark .dark\:text-green-100 {
        color: rgba(209, 250, 229);
    }

    .dark .dark\:text-blue-400 {
        color: rgba(96, 165, 250);
    }

    .dark .group:hover .dark\:group-hover\:text-gray-500 {
        color: rgba(107, 114, 128);
    }

    .dark .group:focus .dark\:group-focus\:text-gray-700 {
        color: rgba(55, 65, 81);
    }

    .dark .dark\:hover\:text-gray-100:hover {
        color: rgba(243, 244, 246);
    }

    .dark .dark\:hover\:text-blue-500:hover {
        color: rgba(59, 130, 246);
    }

    /* Custom style */
    .header-right {
        width: calc(100% - 3.5rem);
    }

    .sidebar:hover {
        width: 16rem;
    }

    @media only screen and (min-width: 768px) {
        .header-right {
            width: calc(100% - 16rem);
        }
    }
</style>

<body>
    <div x-data="setup()" :class="{ 'dark': isDark }">
        <div
            class="min-h-screen flex flex-col flex-auto flex-shrink-0 antialiased bg-white dark:bg-gray-700 text-black dark:text-white">
            @include('components/user')



            @include('includes.sidebar')


            <div class="mt-28">
                @yield('content')
            </div>
            <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
        </div>
    </div>
</body>

<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.0/dist/alpine.min.js" defer></script>
<script>
    const setup = () => {
        const getTheme = () => {
            if (window.localStorage.getItem('dark')) {
                return JSON.parse(window.localStorage.getItem('dark'))
            }
            return !!window.matchMedia && window.matchMedia('(prefers-color-scheme: dark)').matches
        }

        const setTheme = (value) => {
            window.localStorage.setItem('dark', value)
        }

        return {
            loading: true,
            isDark: getTheme(),
            toggleTheme() {
                this.isDark = !this.isDark
                setTheme(this.isDark)
            },
        }
    }
</script>

</html>
