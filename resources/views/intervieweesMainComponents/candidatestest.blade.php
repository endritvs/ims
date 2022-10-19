@extends('layouts.layout')

@section('content')
    <div class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
        <main class="relative h-[100vh] transition-all duration-200 ease-in-out xl:ml-68 rounded-xl" style="height: 100vh;">
            @include('layouts.navbars.topnav')
            <div class="flex flex-row py-6 justify-between">
                <div class="px-6 flex items-start">
                    <a class="mr-4" href="#">
                        <button type="button" data-modal-toggle="addUserModal" class="text-white bg-slate-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</button>
                    </a>
                    <a class="mr-1" href="#">
                        <button type="button" data-modal-toggle="quick-add" class="text-white bg-slate-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Quick Add</button>
                    </a>
                </div>
                <div class="relative flex flex-wrap transition-all rounded-lg ease mr-6">
                    <span class="text-sm ease leading-5.6 absolute z-50 -ml-px flex h-full items-center whitespace-nowrap rounded-lg rounded-tr-none rounded-br-none border border-r-0 border-transparent bg-transparent py-2 px-2.5 text-center font-normal text-slate-500 transition-all">
                      <i class="fas fa-search" aria-hidden="true"></i>
                    </span>
                    <input type="text" class="pl-9 text-sm focus:shadow-primary-outline ease w-1/100 leading-5.6 relative -ml-px block min-w-0 flex-auto rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding py-2 pr-3 text-gray-700 transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none focus:transition-shadow" placeholder="Type here..." />
                </div>
            </div>
           
            <div class="main_grid px-6 pt-1 mx-auto">
                <div>
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        {{-- <img class="w-full rounded-t-2xl" src="../assets/img/starlabs.jpg" alt="profile cover image"> --}}
                        <div class="flex flex-col items-center -mx-3">
                            <div class="w-4/12 max-w-full px-3 flex-0 ">
                                <div class="my-4">
                                    <a href="javascript:;">
                                        <img class="h-auto max-w-full border-2 border-white border-solid rounded-circle"
                                            src="../assets/img/team-2.jpg" alt="profile image">
                                    </a>
                                </div>
                            </div>
                            <h5 class="dark:text-white text-center">Mark Davis</h5>
                        </div>
                        

                        <div class="flex-auto p-6 pt-0">
                            <div class="text-center">
                                <div class="my-2 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                                    <i class="mr-2 dark:text-white ni ni-pin-3"></i>
                                    BACKEND/FRONTEND
                                </div>
                                <div class="my-2 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                                    <i class="mr-2 dark:text-white ni ni-briefcase-24"></i>
                                    HTML/CSS/REACT
                                </div>
                                <div class="my-2 dark:text-white/80">
                                    <i class="mr-2 dark:text-white ni ni-hat-3"></i>
                                    DATE OF INTERVIEW
                                </div>
                            </div>
                        </div>
                        <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
                            <div class="flex justify-between">
                                <button type="button"
                                    class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Accept</button>
                                <button type="button"
                                    class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-slate-700 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Decline</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        {{-- <img class="w-full rounded-t-2xl" src="../assets/img/starlabs.jpg" alt="profile cover image"> --}}
                        <div class="flex flex-col items-center -mx-3">
                            <div class="w-4/12 max-w-full px-3 flex-0 ">
                                <div class="my-4">
                                    <a href="javascript:;">
                                        <img class="h-auto max-w-full border-2 border-white border-solid rounded-circle"
                                            src="../assets/img/team-2.jpg" alt="profile image">
                                    </a>
                                </div>

                            </div>
                            <h5 class="dark:text-white text-center">Mark Davis</h5>
                        </div>
                        <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
                            <div class="flex justify-between">
                                <button type="button"
                                    class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Accept</button>
                                <button type="button"
                                    class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-slate-700 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Decline</button>
                            </div>
                        </div>

                        <div class="flex-auto p-6 pt-0">
                            <div class="text-center">
                                <div class="my-2 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                                    <i class="mr-2 dark:text-white ni ni-pin-3"></i>
                                    BACKEND/FRONTEND
                                </div>
                                <div class="my-2 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                                    <i class="mr-2 dark:text-white ni ni-briefcase-24"></i>
                                    HTML/CSS/REACT
                                </div>
                                <div class="my-2 dark:text-white/80">
                                    <i class="mr-2 dark:text-white ni ni-hat-3"></i>
                                    DATE OF INTERVIEW
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div >
                    <div
                        class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                        {{-- <img class="w-full rounded-t-2xl" src="../assets/img/starlabs.jpg" alt="profile cover image"> --}}
                        <div class="flex flex-col items-center -mx-3">
                            <div class="w-4/12 max-w-full px-3 flex-0 ">
                                <div class="my-4">
                                    <a href="javascript:;">
                                        <img class="h-auto max-w-full border-2 border-white border-solid rounded-circle"
                                            src="../assets/img/team-2.jpg" alt="profile image">
                                    </a>
                                </div>

                            </div>
                            <h5 class="dark:text-white text-center">Mark Davis</h5>
                        </div>
                        <div class="border-black/12.5 rounded-t-2xl p-6 text-center pt-0 pb-6 lg:pt-2 lg:pb-4">
                            <div class="flex justify-between">
                                <button type="button"
                                    class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-cyan-500 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Accept</button>
                                <button type="button"
                                    class="hidden px-8 py-2 font-bold leading-normal text-center text-white align-middle transition-all ease-in border-0 rounded-lg shadow-md cursor-pointer text-xs bg-slate-700 lg:block tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Decline</button>
                            </div>
                        </div>

                        <div class="flex-auto p-6 pt-0">
                            <div class="text-center">
                                <div class="my-2 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                                    <i class="mr-2 dark:text-white ni ni-pin-3"></i>
                                    BACKEND/FRONTEND
                                </div>
                                <div class="my-2 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                                    <i class="mr-2 dark:text-white ni ni-briefcase-24"></i>
                                    HTML/CSS/REACT
                                </div>
                                <div class="my-2 dark:text-white/80">
                                    <i class="mr-2 dark:text-white ni ni-hat-3"></i>
                                    DATE OF INTERVIEW
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
