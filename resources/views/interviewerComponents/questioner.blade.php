@extends('layouts.layout')
@section('content')
    <div class="m-0 font-sans text-base antialiased font-normal dark:bg-slate-900 leading-default bg-gray-50 text-slate-500">
        <div class="absolute w-full bg-blue-500 dark:hidden min-h-75"></div>
        <main class="relative h-[100vh] transition-all duration-200 ease-in-out xl:ml-68 rounded-xl" style="height: 100vh;">
            @include('layouts.navbars.topnav')
            <div class="w-full px-6 py-6 mx-auto">
                <!-- table 1 -->

                <div class="flex flex-wrap -mx-3">
                    <div class="flex-none w-full max-w-full px-3">
                        <div
                            class="relative flex flex-col min-w-0 mb-6 break-words bg-white border-0 border-transparent border-solid shadow-xl dark:bg-slate-850 dark:shadow-dark-xl rounded-2xl bg-clip-border">
                            <div class="p-6 pb-0 mb-0 border-b-0 border-b-solid rounded-t-2xl border-b-transparent">
                                <h6 class="dark:text-white">Interviewer</h6>
                                <a class="absolute top-4 right-6" href="#">
                                    <button type="button" data-modal-toggle="addUserModal"
                                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs hover:-translate-y-px active:opacity-85 hover:shadow-md">Create</button>
                                </a>
                            </div>
                            <div class="flex-auto px-0 pt-0 pb-2">
                                <div class="p-0 overflow-x-auto">
                                    <table
                                        class="items-center w-full mb-0 align-top border-collapse dark:border-white/40 text-slate-500">
                                        <thead class="align-bottom">
                                            <tr>
                                                <th
                                                    class="px-6 py-3 font-semibold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                                    Name</th>
                                                <th
                                                    class="px-6 py-3 pl-2 font-semibold text-left uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                                    Role</th>
                                                <th
                                                    class="px-6 py-3 font-semibold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-sm border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                                    Edit</th>
                                                <th
                                                    class="px-6 py-3 font-semibold text-center uppercase align-middle bg-transparent border-b border-collapse shadow-none dark:border-white/40 dark:text-white text-xs border-b-solid tracking-none whitespace-nowrap text-slate-700 opacity-70">
                                                    Delete</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($interviewer as $i)
                                                @php
                                                    $link = explode('/', $i->img);
                                                    
                                                @endphp
                                                <tr>
                                                    <td
                                                        class="p-2 align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <div class="flex px-2 py-1">
                                                            <div>
                                                                @if ($i->img === 'public/noProfilePhoto/nofoto.jpg')
                                                                    <img src="{{ asset('/noProfilePhoto/' . $link[2]) }}"
                                                                        class="inline-flex items-center object-cover justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl" />
                                                                @else
                                                                    <img src="/storage/img/{{ $link[2] }}"
                                                                        class="inline-flex items-center object-cover justify-center mr-4 text-sm text-white transition-all duration-200 ease-in-out h-9 w-9 rounded-xl" />
                                                                @endif
                                                            </div>
                                                            <div class="flex flex-col justify-center">
                                                                <h6 class="mb-0 text-sm leading-normal dark:text-white">
                                                                    {{ $i->name }}</h6>
                                                                <p
                                                                    class="mb-0 text-xs leading-tight dark:text-white dark:opacity-80 text-slate-400">
                                                                    {{ $i->email }}</p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td
                                                        class="p-2 align-middle uppercase bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <p
                                                            class="mb-0 text-xs font-semibold leading-tight dark:text-white dark:opacity-80">
                                                            {{ $i->role }}</p>
                                                    </td>
                                                    <td
                                                        class="p-2 text-sm leading-normal text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <a data-modal-toggle="editModal{{ $i->id }}"
                                                            class="inline-block dark:text-white px-4 py-2.5 mb-0 font-bold transition-all bg-transparent border-0 rounded-lg shadow-none cursor-pointer leading-normal ease-in bg-150 hover:-translate-y-px active:opacity-85 bg-x-25 text-slate-700"
                                                            href="javascript:;"><i
                                                                class="mr-2 fas fa-pencil-alt text-slate-700"
                                                                aria-hidden="true"></i>Edit</a>
                                                    </td>
                                                    <td
                                                        class="p-2 text-sm text-center align-middle bg-transparent border-b dark:border-white/40 whitespace-nowrap shadow-transparent">
                                                        <a data-modal-toggle="deleteUserModal{{ $i->id }}"
                                                            class="relative z-10 inline-block px-4 py-2.5 mb-0 font-bold text-transparent transition-all border-0 rounded-lg shadow-none cursor-pointer leading-normal ease-in bg-150 bg-gradient-to-tl from-red-600 to-orange-600 hover:-translate-y-px active:opacity-85 bg-x-25 bg-clip-text"
                                                            href="#"><i
                                                                class="mr-2 far fa-trash-alt bg-150 bg-gradient-to-tl from-red-600 to-orange-600 bg-x-25 bg-clip-text"></i>Delete</a>
                                                    </td>

                                                </tr>
                                                <div id="deleteUserModal{{ $i->id }}" tabindex="-1"
                                                    class="fixed hidden top-0 left-0 w-full h-full overflow-x-hidden overflow-y-auto z-sticky outline-0">
                                                    <div
                                                        class="relative w-auto m-2 sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-48">
                                                        <div class="relative bg-white rounded-lg shadow dark:bg-slate-850">
                                                            <button type="button"
                                                                class="absolute top-3 right-2.5 text-slate-700 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                                data-modal-toggle="deleteUserModal{{ $i->id }}">
                                                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor"
                                                                    viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                                    <path fill-rule="evenodd"
                                                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                <span class="sr-only">Close modal</span>
                                                            </button>
                                                            <div class="p-6 text-center">
                                                                <svg aria-hidden="true"
                                                                    class="mx-auto mb-4 w-14 h-14 text-slate-700 dark:text-gray-200"
                                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                                    xmlns="http://www.w3.org/2000/svg">
                                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                                        stroke-width="2"
                                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                                                    </path>
                                                                </svg>
                                                                <h3
                                                                    class="mb-5 text-lg font-normal text-slate-700 dark:text-gray-400">
                                                                    Are
                                                                    you sure you want to delete this?</h3>
                                                                <a href="{{ route('interviewer.destroy', $i->id) }}">
                                                                    <button
                                                                        data-modal-toggle="deleteUserModal{{ $i->id }}"
                                                                        type="button"
                                                                        class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-gradient-to-tl from-red-600 to-orange-600 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">
                                                                        Yes, I'm sure
                                                                    </button>
                                                                </a>
                                                                <button
                                                                    data-modal-toggle="deleteUserModal{{ $i->id }}"
                                                                    type="button"
                                                                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">No,
                                                                    cancel</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div id="editModal{{ $i->id }}" tabindex="-1" aria-hidden="true"
                                                    class="fixed hidden top-0 left-0 w-full h-full overflow-x-hidden overflow-y-auto z-sticky outline-0">
                                                    <div
                                                        class="relative w-full xl:w-4/12 lg:w-1/2 mx-6 sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-48 rounded-lg bg-white dark:bg-slate-850">

                                                        <form method="POST"
                                                            action="{{ route('interviewer.update', $i->id) }}"
                                                            class="relative shadow" enctype="multipart/form-data">
                                                            @csrf

                                                            <div
                                                                class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                                <h3
                                                                    class="text-xl font-semibold text-gray-900 dark:text-white">
                                                                    Interviewer:
                                                                </h3>
                                                                <button type="button"
                                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                                    data-modal-toggle="editModal{{ $i->id }}">
                                                                    <svg class="w-5 h-5" fill="currentColor"
                                                                        viewBox="0 0 20 20"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path fill-rule="evenodd"
                                                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                </button>
                                                            </div>

                                                            <div class="p-6 space-y-6">
                                                                <div class="space-y-6">
                                                                    <div>
                                                                        <label for="name"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                                        <input type="text" name="name"
                                                                            id="name" autocomplete="given-name"
                                                                            class=" @error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-white dark:border-gray-300 dark:placeholder-gray-300 dark:text-black"
                                                                            placeholder="Interviewee Type Name"
                                                                            value="{{ $i->name }}" required>

                                                                        @error('name')
                                                                            <div
                                                                                class="ml-1 text-red-500 text-xs alert alert-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div>
                                                                        <label for="name"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                                        <input type="text" name="email"
                                                                            id="name" autocomplete="given-name"
                                                                            class="@error('email') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-white dark:border-gray-300 dark:placeholder-gray-300 dark:text-black"
                                                                            placeholder="Interviewee Type Name"
                                                                            value="{{ $i->email }}" required>
                                                                        @error('email')
                                                                            <div
                                                                                class="ml-1 text-red-500 text-xs alert alert-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror

                                                                    </div>
                                                                    <div>
                                                                        <label for="name"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role</label>
                                                                        <select name="role"
                                                                            class="@error('role') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg p-2 focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-white dark:border-gray-300 dark:placeholder-gray-300 dark:text-black"
                                                                            id="role">
                                                                            @if ($i->role === 'admin')
                                                                                <option value="admin">Admin</option>
                                                                                <option value="interviewer">Interviewer
                                                                                </option>
                                                                            @elseif($i->role === 'interviewer')
                                                                                <option value="interviewer">Interviewer
                                                                                </option>
                                                                                <option value="admin">Admin</option>
                                                                            @endif


                                                                        </select>

                                                                        @error('role')
                                                                            <div
                                                                                class="ml-1 text-red-500 text-xs alert alert-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror
                                                                    </div>
                                                                    <div>
                                                                        <label for="name"
                                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Image</label>
                                                                        <input type="file" name="img"
                                                                            id="img" autocomplete="given-name"
                                                                            class="@error('img') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-white dark:border-gray-300 dark:placeholder-gray-300 dark:text-black">
                                                                        @error('img')
                                                                            <div
                                                                                class="ml-1 text-red-500 text-xs alert alert-danger">
                                                                                {{ $message }}</div>
                                                                        @enderror

                                                                    </div>
                                                                    <div class="text-black dark:text-white">
                                                                    @if ($i->img === 'public/noProfilePhoto/nofoto.jpg')
                                                                       <p>Current Image</p>
                                                                        <img class="rounded"
                                                                            src="{{ asset('/noProfilePhoto/' . $link[2]) }}"
                                                                            width="50px" height="50px">
                                                                    @else
                                                                        <p>Current Image</p>
                                                                        <img class="rounded"
                                                                            src="/storage/img/{{ $link[2] }}"
                                                                            width="50px" height="50px">
                                                                    @endif
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                                <button type="submit"
                                                                    data-modal-toggle="editModal{{ $i->id }}"
                                                                    class="inline-block px-6 py-3 mr-3 font-bold text-center text-white uppercase align-middle transition-all bg-blue-500 rounded-lg cursor-pointer leading-normal text-xs ease-in tracking-tight-rem shadow-xs bg-150 bg-x-25 hover:-translate-y-px active:opacity-85 hover:shadow-md">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="p-3">
                                    {{ $interviewer->links() }}
                                </div>
                            </div>
                        </div>
                        <div id="addUserModal" tabindex="-1" aria-hidden="true"
                            class="fixed hidden top-0 left-0 w-full h-full overflow-x-hidden overflow-y-auto z-sticky outline-0">
                            <div class="relative w-full xl:w-4/12 lg:w-1/2 mx-6 sm:m-7 sm:max-w-125 sm:mx-auto lg:mt-48 rounded-lg bg-white dark:bg-slate-850">

                                <form method="POST" action="{{ route('interviewer.store') }}"
                                    class="relative shadow"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <div
                                        class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-200">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            Create Interviewer
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="addUserModal">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <div class="p-6 space-y-6">
                                        <div class="space-y-6">

                                            <div>
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                                <input type="text" name="name" id="name"
                                                    autocomplete="given-name"
                                                    class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-white dark:border-gray-300 dark:placeholder-gray-300 dark:text-black"
                                                    placeholder="Name" required>

                                                @error('name')
                                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                                <input type="email" name="email" id="email"
                                                    autocomplete="given-name"
                                                    class="@error('email') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-white dark:border-gray-300 dark:placeholder-gray-300 dark:text-black"
                                                    placeholder="Email" required>

                                                @error('email')
                                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Password</label>
                                                <input type="password" name="password" id="password"
                                                    autocomplete="given-name"
                                                    class="@error('password') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-white dark:border-gray-300 dark:placeholder-gray-300 dark:text-black"
                                                    placeholder="Password" required>

                                                @error('password')
                                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                            <div>

                                                <input type="hidden" name="role" id="role"
                                                    autocomplete="given-name"
                                                    class="@error('role') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-white dark:border-gray-300 dark:placeholder-gray-300 dark:text-black"
                                                    placeholder="Role" value="admin" required>

                                                @error('role')
                                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>

                                            <div> <label class="text-center dark:text-white">Optional</label>
                                                <label for="name"
                                                    class="block mb-2 text-sm font-medium text-gray-900 underline dark:text-white">Image</label>
                                                <input type="file" name="img" id="img"
                                                    autocomplete="given-name"
                                                    class="@error('img') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full dark:bg-white dark:border-gray-300 dark:placeholder-gray-300 dark:text-black">

                                                @error('img')
                                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">
                                                        {{ $message }}</div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>

                                    <div
                                        class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                        <button type="submit" data-modal-toggle="addUserModal"
                                            class="text-white bg-blue-500 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-500 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
