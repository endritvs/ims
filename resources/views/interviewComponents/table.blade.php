@extends('layouts.layout')

@section('content')
    <div class="mx-6 overflow-x-auto relative shadow-md sm:rounded-lg container mx-auto">
        <table class="w-full text-sm text-left  text-gray-400">
            <caption class="p-5 relative text-lg font-semibold text-left  bg-white text-white bg-gray-800">
                Your Interviewee Types
                <p class="mt-1 text-sm font-normal text-gray-400">Browse a list of Interviewee Types products designed to
                    help you work, grow your business, and more. (Fix this text)</p>
                <a class="absolute top-4 right-6" href="{{ route('interviewee.create') }}">
                    <button
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</button>
                </a>
                <a class="absolute top-4 right-6" href="#">
                    <button type="button" data-modal-toggle="addUserModal"
                        class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</button>
                </a>
            </caption>
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 bg-gray-700 text-gray-400">
                <tr>
                    <th scope="col" class="py-3 px-6">
                        Id
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Name
                    </th>
                    <th scope="col" class="py-3 px-6">
                        CV
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Interviewer
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Interviewee
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Date
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Interviewee Types
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Interviewee Attribute
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Edit
                    </th>
                    <th scope="col" class="py-3 px-6">
                        Delete
                    </th>
                </tr>
            </thead>
            {{--  --}}
            <tbody>

                @foreach ($interview as $i)
                    @php
                        
                        $link = explode('/', $i->interviewees->img);
                        $cv = explode('/', $i->interviewees->cv_path);
                    @endphp
                    <!-- Qet secilin prej userave ne tabele -->
                    <tr class="bg-white border-b bg-gray-800 border-gray-700">
                        <td class="py-4 px-6 text-white">
                            {{ $i->id }}
                            <!-- Qet ID te Userit -->
                        </td>

                        <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
                            {{ $i->interview_id }}
                            <!-- Qet Emrin e Userit -->
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
                            <!-- Qet Emrin e Userit -->
                            <a class="underline" href="/storage/cv_path/{{ $cv[2] }}" download>Download CV</a>
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
                            {{ $i->user->name }}
                            <!-- Qet Emrin e Userit -->
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
                            <!-- Qet Emrin e Userit -->
                            {{ $i->interviewees->name . ' ' . $i->interviewees->surname }}
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
                            {{ $i->interview_date }}
                            <!-- Qet Emrin e Userit -->
                        </th>
                        <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
                            {{ $i->interviewees->interviewee_type->name }}
                            <!-- Qet Emrin e Userit -->
                        </th>

                        <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
                            @foreach ($exec as $a)
                                @if ($i->interviewees->interviewee_type->name === $a->name)
                                    {{ $a->Attributes }}
                                @endif
                            @endforeach
                        </th>


                        <td class="py-4 px-6 text-blue-600">
                            <a href="{{ route('interview.edit', $i->id) }}">Edit</a> <!-- Edit Button Here -->
                        </td>
                        <td class="py-4 px-6 text-red-600">
                            <button type="button" data-modal-toggle="deleteUserModal{{ $i->id }}"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        </td>
                    </tr>
                    <!-- Delete Modal -->
                    <div id="deleteUserModal{{ $i->id }}" tabindex="-1"
                        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                <button type="button"
                                    class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                    data-modal-toggle="deleteUserModal{{ $i->id }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200"
                                        fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you
                                        want to delete this Interviewee Types?</h3>
                                    <a href="{{ route('interview.destroy', $i->id) }}">
                                        <button data-modal-toggle="deleteUserModal{{ $i->id }}" type="button"
                                            class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                            Yes, I'm sure
                                        </button>
                                    </a>
                                    <button data-modal-toggle="deleteUserModal{{ $i->id }}" type="button"
                                        class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                        data-modal-toggle="deleteUserModal{{ $i->id }}">No, cancel</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </tbody>
        </table>
        <a class="underline " href="{{ route('public.index') }}">Return to Table</a>
        {{ $interview->links() }}
    </div>



    <!-- Add New-->
    <div id="addUserModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            <!-- Modal content -->
            <form method="POST" action="{{ route('interview.store') }}"
                class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                @csrf
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Interviewee Type:
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="addUserModal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <div class="space-y-6">
                        <div>

                            <input type="number" name="interview_id" id="interview_name"
                                value="{{ empty($interviewss->last()->interview_id) ? '1' : ++$interviewss->last()->interview_id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>

                        </div>
                        <div>
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>

                            <select name="interviewer[]"
                                class="@error('interviewer') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                id="interviewer" multiple="multiple">
                                @foreach ($admin as $a)
                                    <option value="{{ $a->id }}">{{ $a->name }}</option>
                                @endforeach
                            </select>
                            @error('interviewer')
                                <div class="alert alert-danger error-login">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>

                        <select name="interviewees_id"
                            class="@error('interviewees_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            id="interviewees_id">
                            @foreach ($interviewee as $a)
                                <option value="{{ $a->id }}">{{ $a->name }}</option>
                            @endforeach
                        </select>
                        @error('interviewees_id')
                            <div class="alert alert-danger error-login">{{ $message }}</div>
                        @enderror
                    </div>


                    <label>Choose date:</label>
                    <input type="date" name="interview_date" min=<?php echo date('Y-m-d'); ?> id="dateId"
                        class="@error('interview_date') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white ">

                    @error('interview_date')
                        <div class="alert alert-danger error-login">{{ $message }}</div>
                    @enderror


                </div>


                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" data-modal-toggle="addUserModal"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                </div>
            </form>
        </div>
    </div>
@endsection('content')
