<!-- sidenav  -->
@php
    $link = explode('/', Auth::user()->img);
    $linkCompany = explode('/', Auth::user()->company->image);
    $menu = array();
    $menu[] = array(
        'name' => 'Dashboard',
        'route' => 'dashboard',
        'icon' => 'ni ni-tv-2',
        'iconColor' => 'text-blue-500'
    );
    $menu[] = array(
        'name' => 'Candidates',
        'route' => 'candidates',
        'icon' => 'fa-solid fa-users',
        'iconColor' => 'text-emerald-500'
    );
    $menu[] = array(
        'name' => 'Interview',
        'route' => 'interview',
        'icon' => 'ni ni-app',
        'iconColor' => 'text-cyan-500'
    );
    $menu[] = array(
        'name' => 'Questioner',
        'route' => 'questioners',
        'icon' => 'fa-solid fa-user',
        'iconColor' => 'text-red-600'
    );
@endphp

<aside class="fixed inset-y-0 flex-wrap items-center justify-between block w-full p-0 my-4 overflow-y-auto antialiased transition-transform duration-200 -translate-x-full bg-white border-0 shadow-xl dark:shadow-none dark:bg-slate-850 max-w-64 ease-nav-brand z-990 xl:ml-6 rounded-2xl xl:left-0 xl:translate-x-0"
    aria-expanded="false">
    <div class="h-19">
        <i class="absolute top-0 right-0 p-4 opacity-50 cursor-pointer fas fa-times dark:text-white text-slate-400 xl:hidden"
            sidenav-close></i>
        <div class="block px-8 py-6 m-0 text-xl whitespace-nowrap dark:text-white text-slate-700">
            @if (Auth::user()->company->image === 'public/noProfilePhoto/nofoto.jpg')
                <img src="{{ asset('/noProfilePhoto/' . $linkCompany[2]) }}"
                    class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8" alt="main_logo" />
            @else
                <img src="/storage/imgCompanies/{{ $linkCompany[2] }}"
                    class="inline h-full max-w-full transition-all duration-200 ease-nav-brand max-h-8"
                    alt="main_logo" />
            @endif
            <span
                class="ml-1 font-semibold transition-all duration-200 ease-nav-brand">{{ Auth::user()->company->company_name }}</span>
        </div>
    </div>

    <hr
        class="h-px mt-0 bg-transparent bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent" />

    <div class="items-center block w-auto max-h-screen overflow-auto h-sidenav grow basis-full">
        <ul class="flex flex-col pl-0 mb-0">
            @foreach($menu as $item)
            <li class="mt-0.5 w-full">
                <a class="py-2.7 {{Request::is($item['route']) ? 'bg-blue-500/13' : '' }} dark:text-white dark:opacity-80 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap rounded-lg px-4 font-semibold text-slate-700 transition-colors"
                    href="/{{$item['route']}}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal {{$item['icon']}} {{$item['iconColor']}}"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">{{$item['name']}}</span>
                </a>
            </li>
            @endforeach
            @if (Auth::user()->role === 'admin')
                <li class="w-full mt-4">
                    <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Admin
                    </h6>
                </li>
                <li class="mt-0.5 w-full">
                    <a class=" dark:text-white {{Request::is('candidate-options') ? 'bg-blue-500/13' : '' }} rounded-lg dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                        href="{{ route('intervieweeAttributes.index') }}">
                        <div
                            class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                            <i class="relative top-0 text-sm leading-normal text-orange-500 fa-solid fa-user-plus"></i>
                        </div>
                        <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Candidates Options</span>
                    </a>
                </li>
            @endif

            <li class="w-full mt-4">
                <h6 class="pl-6 ml-2 text-xs font-bold leading-tight uppercase dark:text-white opacity-60">Account pages
                </h6>
            </li>
            <li class="mt-0.5 w-full">
                <a class=" dark:text-white {{Request::is('edit-profile/*') ? 'bg-blue-500/13' : '' }} rounded-lg dark:opacity-80 py-2.7 text-sm ease-nav-brand my-0 mx-2 flex items-center whitespace-nowrap px-4 transition-colors"
                    href="{{ route('interview.editProfile', Auth::user()->id) }}">
                    <div
                        class="mr-2 flex h-8 w-8 items-center justify-center rounded-lg bg-center stroke-0 text-center xl:p-2.5">
                        <i class="relative top-0 text-sm leading-normal text-slate-700 ni ni-single-02"></i>
                    </div>
                    <span class="ml-1 duration-300 opacity-100 pointer-events-none ease">Profile</span>
                </a>
            </li>
        </ul>
    </div>
</aside>

<!-- end sidenav -->