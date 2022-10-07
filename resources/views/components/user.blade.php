<div class="fixed w-full flex items-center h-14 text-white z-10">
    <div class="flex w-full justify-end h-14 bg-blue-900 dark:bg-gray-900 header-right">
        <!-- Profile dropdown -->
        <div class="flex items-center md:order-2 mr-3">
            <button type="button"
                class="flex mr-3 text-sm bg-gray-800 rounded-full md:mr-0 focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                id="user-menu-button" aria-expanded="false" data-dropdown-toggle="user-dropdown"
                data-dropdown-placement="bottom">
                <span class="sr-only">Open user menu</span>
                @php
                    $link = explode('/', Auth::user()->img);
                @endphp
                @if (Auth::user()->img === 'public/noProfilePhoto/nofoto.jpg')
                    <div
                        class="inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                        <span class="font-medium text-gray-600 dark:text-white">
                            <img src="{{ asset('/noProfilePhoto/' . $link[2]) }}">
                        </span>

                    </div>
                    <span class="font-medium text-white relative bottom-3 capitalize">{{ Auth::user()->name }}</span>
                @else
                    <div
                        class="inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                        <span class="font-medium text-gray-600 dark:text-white">
                            <img src="/storage/img/{{ $link[2] }}">
                        </span>

                    </div>
                @endif
            </button>
            <!-- Dropdown menu -->
            <div class="hidden z-50 my-4 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600"
                id="user-dropdown">
                <div class="py-3 px-4">
                    <span
                        class="block text-sm text-gray-900 dark:text-white capitalize">{{ Auth::user()->name . ' ' . Auth::user()->surname }}</span>
                    <span
                        class="block text-sm font-medium text-gray-900 truncate dark:text-white">{{ Auth::user()->email }}</span>
                </div>
                <ul class="py-1" aria-labelledby="user-menu-button">
                    <li>
                        <a href="{{ route('interview.editProfile', Auth::user()->id) }}"
                            class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-500 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">
                            <i class="fa-solid fa-user mr-1"></i>
                            Profile
                        </a>
                    </li>
                    <form
                        class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-500 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white"
                        method="POST" action="{{ route('logout') }}">
                        @csrf
                        <li>
                            <button type="submit">
                                <span class="inline-flex mr-1">
                                    <i class="fa-solid fa-right-from-bracket"></i>
                                </span>
                                Logout
                            </button>
                        </li>
                    </form>
                </ul>
            </div>
        </div>

        <ul class="flex items-center">
            <li>
                <button id="theme-toggle" type="button"
                    class="text-white dark:text-white hover:bg-gray-300 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1">
                    <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                    </svg>
                    <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                            fill-rule="evenodd" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </li>
            <li>
                <div class="block w-px h-6 mx-3 bg-gray-400 dark:bg-gray-700 ml-1"></div>
            </li>
        </ul>
    </div>

     {{-- DARK MODE BUTTON  --}}
    <script>
        var themeToggleDarkIcon = document.getElementById('theme-toggle-dark-icon');
        var themeToggleLightIcon = document.getElementById('theme-toggle-light-icon');
        // Change the icons inside the button based on previous settings
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            themeToggleLightIcon.classList.remove('hidden');
        } else {
            themeToggleDarkIcon.classList.remove('hidden');
        }
        var themeToggleBtn = document.getElementById('theme-toggle');
        themeToggleBtn.addEventListener('click', function() {

            // toggle icons inside button
            themeToggleDarkIcon.classList.toggle('hidden');
            themeToggleLightIcon.classList.toggle('hidden');

            // if set via local storage previously
            if (localStorage.getItem('color-theme')) {
                if (localStorage.getItem('color-theme') === 'light') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                } else {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                }
                // if NOT set via local storage previously
            } else {
                if (document.documentElement.classList.contains('dark')) {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('color-theme', 'light');
                } else {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('color-theme', 'dark');
                }
            }
        });
    </script>
</div>
