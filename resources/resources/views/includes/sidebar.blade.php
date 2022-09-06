<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/fontawesome.min.css" integrity="sha512-RvQxwf+3zJuNwl4e0sZjQeX7kUa3o82bDETpgVCH2RiwYSZVDdFJ7N/woNigN/ldyOOoKw8584jM4plQdt8bhA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<div class="fixed flex flex-col top-0 left-0 w-14 hover:w-64 md:w-64 bg-blue-900 dark:bg-gray-900 h-full text-white transition-all duration-300 border-none z-10 sidebar">
    <div class="overflow-y-auto overflow-x-hidden flex flex-col justify-between flex-grow">
        @php
        $link = explode('/', Auth::user()->img);

        @endphp

        <ul class="flex flex-col py-4 space-y-1">
            <li class="px-5 hidden md:block">
                @if (Auth::user()->img==="public/noProfilePhoto/nofoto.jpg")
                <div class="inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                    <span class="font-medium text-gray-600 dark:text-white">
                        <img src="{{asset('/noProfilePhoto/'.$link[2])}}">
                    </span>

                </div>
                <span class="font-medium text-white relative bottom-3 capitalize">{{Auth::user()->name}}</span>
                @else
                <div class="inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                    <span class="font-medium text-gray-600 dark:text-white">
                        <img src="/storage/img/{{$link[2]}}">
                    </span>

                </div>
                <span class="font-medium text-white relative pl-3 bottom-4 uppercase">{{Auth::user()->name}}</span>

                @endif

                <div class="flex flex-row items-center h-8 mt-5">
                    <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Main</div>
                </div>
            </li>
            <li>
                <a href="/dashboard" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-solid fa-house"></i>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="#" id="dropdownDefault" data-dropdown-toggle="dropdown" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Candidates</span>
                    <span class="hidden md:block px-2 py-0.5 ml-auto text-xs font-medium tracking-wide text-blue-500 bg-white rounded-full">
                        <svg class="ml-2 w-4 h-4" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg></span>
                </a>
                <div id="dropdown" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefault">
                        <li>
                            <a href="{{route('interviewee.index')}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Candidate Type</a>
                        </li>
                        <li>
                            <a href="{{route('intervieweeAttributes.index')}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Candidate Attributes</a>
                        </li>
                        <li>
                            <a href="{{route('interviewees.index')}}" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Candidates</a>
                        </li>

                    </ul>
                </div>
            </li>
            <li>
                <a href="{{route('public.index')}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                            </path>
                        </svg>

                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Interview</span>
                </a>
            </li>
            <li>
                <a href="{{route('interviewer.index')}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <i class="fa-solid fa-user"></i>

                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Questioner</span>
                </a>
            </li>


            <li>
                <a href="{{route('review.index')}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                            </path>
                        </svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">My Reviews</span>
                </a>
            </li>

            <li class="px-5 hidden md:block">
                <div class="flex flex-row items-center mt-5 h-8">
                    <div class="text-sm font-light tracking-wide text-gray-400 uppercase">Settings</div>
                </div>
            </li>
            <li>
                <a href="{{route('interview.editProfile',Auth::user()->id)}}" class="relative flex flex-row items-center h-11 focus:outline-none hover:bg-blue-800 dark:hover:bg-gray-600 text-white-600 hover:text-white-800 border-l-4 border-transparent hover:border-blue-500 dark:hover:border-gray-800 pr-6">
                    <span class="inline-flex justify-center items-center ml-4">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </span>
                    <span class="ml-2 text-sm tracking-wide truncate">Profile</span>
                </a>
            </li>

        </ul>
        <p class="px-5 py-3 hidden md:block text-center text-xs"> {{Auth::user()->company->company_name." ". date("Y")}}</p>
    </div>
</div>