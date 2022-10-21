@extends('layouts.layout')
@section('content')
<div class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
    <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>

    <main class="relative transition-all duration-200 ease-in-out xl:ml-68 rounded-xl">
            @include('layouts.navbars.topnav')
            <div class="relative w-full mx-auto">
                <div
                    class="relative flex flex-col flex-auto min-w-0 p-4 mx-6 overflow-hidden break-words bg-white border-0 dark:bg-slate-850 dark:shadow-dark-xl shadow-3xl rounded-2xl bg-clip-border">
                    <div class="flex flex-wrap -mx-3">
                        <div class="flex-none w-auto max-w-full px-3 my-auto">
                            <div class="h-full">
                                <h5 class="mb-1 dark:text-white">{{ Auth::user()->name }}</h5>
                                <p class="mb-0 font-semibold leading-normal dark:text-white dark:opacity-60 text-sm">Public
                                    Relations</p>
                            </div>
                        </div>
                    </div>
                </div>
                @php
                    
                    $link = explode('/', Auth::user()->img);
                    $linkCompany = explode('/', Auth::user()->company->image);
                @endphp
                <div class="w-full p-6 mx-auto">
                    <div class="flex flex-wrap -mx-3">
                        <div class="w-full max-w-full px-3 shrink-0 md:w-8/12 md:flex-0">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                                <div class="border-black/12.5 rounded-t-2xl border-b-0 border-solid p-6 pb-0">
                                    <div class="flex items-center">
                                        <p class="mb-0 dark:text-white/80">Edit Profile</p>
                                        <button type="button"
                                            class="inline-block px-8 py-2 mb-4 ml-auto font-bold leading-normal text-center text-white align-middle transition-all ease-in bg-blue-500 border-0 rounded-lg shadow-md cursor-pointer text-xs tracking-tight-rem hover:shadow-xs hover:-translate-y-px active:opacity-85">Settings</button>
                                    </div>
                                </div>
                                <div class="flex-auto p-6">
                                    <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">User
                                        Information
                                    </p>
                                    <form method="POST" enctype="multipart/form-data"
                                        action="{{ route('interview.updateProfile', Auth::user()->id) }}">
                                        @csrf
                                        <div class="flex flex-wrap -mx-3">
                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                <div class="mb-4">
                                                    <label for="name"
                                                        class="inline-block mb-2 ml-1 font-semibold text-sm text-slate-700 dark:text-white/80">Name</label>
                                                    <input type="name" name="name" value="{{ Auth::user()->name }}"
                                                        class="focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                </div>
                                            </div>
                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                <div class="mb-4">
                                                    <label for="name"
                                                        class="inline-block mb-2 ml-1 font-semibold text-sm text-slate-700 dark:text-white/80">Surname</label>
                                                    <input type="name" name="surname" tabindex="0"
                                                        value="{{ Auth::user()->surname }}"
                                                        class="@error('surname') is-invalid @enderror focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />

                                                    @error('surname')
                                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                <div class="mb-4">
                                                    <label for="email"
                                                        class="inline-block mb-2 ml-1 font-semibold text-sm text-slate-700 dark:text-white/80">Email
                                                        address</label>
                                                    <input type="email" name="email" tabindex="0"
                                                        value="{{ Auth::user()->email }}"
                                                        class="@error('email') is-invalid @enderror focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                    @error('email')
                                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">
                                                            {{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            @if (Auth::user()->role === 'admin')
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="company"
                                                            class="inline-block mb-2 ml-1 font-semibold text-sm text-slate-700 dark:text-white/80">Company
                                                            Name</label>
                                                        <input type="text" name="company_name" tabindex="0"
                                                            value="{{ Auth::user()->company->company_name }}"
                                                            class="@error('company_name') is-invalid @enderror focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @error('company_name')
                                                            <div class="ml-1 text-red-500 text-xs alert alert-danger">
                                                                {{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                                            @endif
                                            <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                <div class="mb-4">
                                                    <label for="file-upload"
                                                        class="inline-block mb-2 ml-1 font-semibold text-sm text-slate-700 dark:text-white/80">Image</label>
                                                    <input id="file-upload" type="file" tabindex="0" name="img"
                                                        class="@error('img') is-invalid @enderror focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                    @error('img')
                                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">
                                                            {{ $message }}</div>
                                                    @enderror
                                                    @if (Auth::user()->img === 'public/noProfilePhoto/nofoto.jpg')
                                                        <img class="mt-3 rounded object-cover"
                                                            src="{{ asset('/noProfilePhoto/' . $link[2]) }}" width="50px"
                                                            height="50px">
                                                    @else
                                                        <img class="rounded ml-1 m-4"
                                                            src="/storage/img/{{ $link[2] }}" width="50px"
                                                            height="50px">
                                                    @endif
                                                </div>
                                            </div>
                                            @if (Auth::user()->role === 'admin')
                                                <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                                    <div class="mb-4">
                                                        <label for="file-upload"
                                                            class="inline-block mb-2 ml-1 font-semibold text-sm text-slate-700 dark:text-white/80">Company
                                                            Image</label>
                                                        <input id="file-upload" type="file" tabindex="0" name="image"
                                                            class="@error('image') is-invalid @enderror focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                        @if (Auth::user()->company->image === 'public/noProfilePhoto/nofoto.jpg')
                                                            <img class="mt-3 rounded object-cover"
                                                                src="{{ asset('/noProfilePhoto/' . $linkCompany[2]) }}"
                                                                width="50px" height="50px">
                                                        @else
                                                            <img class="rounded ml-1 m-4"
                                                                src="/storage/imgCompanies/{{ $linkCompany[2] }}"
                                                                width="50px" height="50px">
                                                        @endif
                                                    </div>
                                                </div>
                                            @endif
                                            <button role="button" aria-label="Next step"
                                                class="inline-block ml-3 px-4 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Save</button>

                                        </div>


                                    </form>
                                    <hr
                                        class="h-px mx-0 my-4 bg-transparent border-0 opacity-25 bg-gradient-to-r from-transparent via-black/40 to-transparent dark:bg-gradient-to-r dark:from-transparent dark:via-white dark:to-transparent " />

                                    <form method="POST" enctype="multipart/form-data" action="{{ route('interview.updatePassword') }}">
                                    @csrf
                                     @if (session('status'))
                                    <div class="mt-3 ml-1 text-green-700 text-md alert alert-success" role="alert">
                                        {{ session('status') }}
                                    </div>
                                    @elseif (session('error'))
                                    <div class="mt-3 ml-1 text-red-500 text-md alert alert-danger" role="alert">
                                        {{ session('error') }}
                                    </div>
                                    @endif
                                        <p class="leading-normal uppercase dark:text-white dark:opacity-60 text-sm">
                                        Change Password
                                    </p>
                                    <div class="flex flex-wrap -mx-3">
                                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                            <div class="mb-4">
                                                <label for="username"
                                                    class="inline-block mb-2 ml-1 font-semibold text-sm text-slate-700 dark:text-white/80">
                                                    Current Password
                                                </label>
                                                <input placeholder="Current Password" type="password" tabindex="0"
                                                    aria-label="Enter current password" name="old_password"
                                                    class="@error('old_password') is-invalid @enderror focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                     @error('old_password')
                                                <span
                                                        class="ml-1 text-red-500 text-xs alert alert-dangerml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</span>
                                                     @enderror
                                            </div>
                                        </div>
                                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                            <div class="mb-4">
                                                <label for="email"
                                                    class="inline-block mb-2 ml-1 font-semibold text-sm text-slate-700 dark:text-white/80">
                                                    New Password</label>
                                                <input placeholder="New Password" type="password" tabindex="0"
                                                    name="new_password"
                                                    class="@error('new_password') is-invalid @enderror focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                    @error('new_password')
                                <span class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</span>
                            @enderror
                                                </div>
                                        </div>
                                        <div class="w-full max-w-full px-3 shrink-0 md:w-6/12 md:flex-0">
                                            <div class="mb-4">
                                                <label for="first name"
                                                    class="inline-block mb-2 ml-1 font-semibold text-sm text-slate-700 dark:text-white/80">
                                                    Confirm New Password
                                                </label>
                                                <input placeholder="Confirm New Password" type="password" tabindex="0"
                                                    name="new_password_confirmation" aria-label="Confirm New Password"
                                                    class="@error('new_password_confirmation') is-invalid @enderror focus:shadow-primary-outline dark:bg-slate-850 dark:text-white text-sm leading-5.6 ease block w-full appearance-none rounded-lg border border-solid border-gray-300 bg-white bg-clip-padding px-3 py-2 font-normal text-gray-700 outline-none transition-all placeholder:text-gray-500 focus:border-blue-500 focus:outline-none" />
                                                    @error('new_password_confirmation')
                                <span class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</span>
                            @enderror
                                                </div>
                                        </div>

                                    </div>
                                    <button role="button" aria-label="Next step"
                                        class="inline-block px-4 py-3 font-bold text-center text-white uppercase align-middle transition-all rounded-lg cursor-pointer bg-blue-500 leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Save</button>
</form>
                                </div>
                            </div>
                        </div>
                        <div class="w-full max-w-full px-3 mt-6 shrink-0 md:w-4/12 md:flex-0 md:mt-0">
                            <div
                                class="relative flex flex-col min-w-0 break-words bg-white border-0 shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                                <img class="w-full rounded-t-2xl" src="../assets/img/curved-images/curved0.jpg"
                                    alt="profile cover image">
                                <div class="flex flex-wrap justify-center -mx-3">
                                    <div class="w-4/12 max-w-full px-3 flex-0 ">
                                        <div class="mb-6 -mt-6 lg:mb-0 lg:-mt-16">
                                            <a href="javascript:;">
                                                @if (Auth::user()->img === 'public/noProfilePhoto/nofoto.jpg')
                                                    <img class="h-auto max-w-full border-2 border-white border-solid rounded-circle"
                                                        src="{{ asset('/noProfilePhoto/' . $link[2]) }}"
                                                        alt="profile image">
                                                @else
                                                    <img class="h-auto max-w-full border-2 border-white border-solid rounded-circle"
                                                        src="/storage/img/{{ $link[2] }}">
                                                @endif
                                            </a>
                                        </div>
                                    </div>
                                </div>


                                <div class="flex-auto p-6 pt-0">
                                    <div class="flex flex-wrap -mx-3">
                                        <div class="w-full max-w-full px-3 flex-1-0">
                                            <h4 class="text-center dark:text-white">Interviews</h4>
                                            <div class="flex justify-center">
                                                <div class="grid text-center">
                                                    <span class="font-bold dark:text-white text-lg">22</span>
                                                    <span
                                                        class="leading-normal dark:text-white text-sm opacity-80">Held</span>
                                                </div>
                                                <div class="grid mx-6 text-center">
                                                    <span class="font-bold dark:text-white text-lg">10</span>
                                                    <span
                                                        class="leading-normal dark:text-white text-sm opacity-80">Remaining</span>
                                                </div>
                                                <div class="grid text-center">
                                                    <span class="font-bold dark:text-white text-lg">89</span>
                                                    <span
                                                        class="leading-normal dark:text-white text-sm opacity-80">Total</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-6 text-center">
                                        <h5 class="dark:text-white ">
                                            {{ Auth::user()->name }}
                                        </h5>
                                        <div
                                            class="mb-2 font-semibold leading-relaxed text-base dark:text-white/80 text-slate-700">
                                            <i class="mr-2 dark:text-white ni ni-briefcase-24"></i>
                                            Company Position/Admin/CEO
                                        </div>
                                        <div class="dark:text-white/80">
                                            <i class="mr-2 dark:text-white ni ni-hat-3"></i>
                                            University of Computer Science
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <footer class="pt-4">
                        <div class="w-full px-6 mx-auto">
                            <div class="flex flex-wrap items-center -mx-3 lg:justify-between">
                                <div class="w-full max-w-full px-3 mt-0 mb-6 shrink-0 lg:mb-0 lg:w-1/2 lg:flex-none">
                                    <div class="leading-normal text-center text-sm text-slate-500 lg:text-left">
                                        ©
                                        <script>
                                            document.write(new Date().getFullYear());
                                        </script>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </main>
    </div>
@endsection
