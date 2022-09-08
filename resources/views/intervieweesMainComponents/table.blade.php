@extends('layouts.layout')

@section('content')
<title>Candidates</title>
<div class="h-full ml-14 mt-8 mb-10 md:ml-64">
    <div class="w-full bg-white dark:bg-gray-800">
        <section class="max-w-6xl mx-auto pb-4 px-4 sm:px-6 lg:px-4 py-12">

            <div class="text-center pb-2">
                <h2 class="text-base font-bold text-indigo-600">
                    {{Auth::user()->company->company_name}}
                </h2>
                <h1 class="dark:text-white text-indigo-600 font-bold text-3xl md:text-4xl lg:text-5xl font-heading ">
                    Candidates
                </h1>

                <form action="{{ route('interviewees.index') }}" method="GET" role="search" class="my-12 mx-20">
                    <div class="flex justify-center">
                        <select class="flex-shrink-0 inline-flex items-center px-1 text-sm font-medium text-center text-gray-900 bg-gray-100 border border-gray-300 rounded-l-lg hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:focus:ring-gray-700 dark:text-white dark:border-gray-600" name="termT" id="termT">
                            <option selected>Choose a category</option>
                            @foreach ($intervieweesT as $t)
                            <option value="{{$t->id}}">{{$t->name}}</option>
                            @endforeach
                        </select>
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" name="term" class=" block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates...">
                            <a href={{route('interviewees.index')}}>
                                <button type="submit" class="absolute top-0 right-0 p-2.5 text-sm font-medium text-white bg-blue-700 rounded-r-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                    <span class="sr-only">Search</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </form>
                <div class="flex justify-end">
                    <a class="mb-2" href="#">
                        <button type="button" data-modal-toggle="addUserModal" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Create</button>
                    </a>
                </div>
            </div>



            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($intervieweesA as $i)
                @php
                $link = explode('/', $i->img);
                $cv = explode('/', $i->cv_path);
                @endphp
                <div class="w-full bg-gray-200 dark:bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">

                    <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{ $i->id }}" class="relative left-[145px] bottom-[30px] inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                            </path>
                        </svg>
                    </button>


                    <div id="dropdownDots{{ $i->id }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                            <li>
                                <a data-modal-toggle="editModal{{ $i->id }}" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit</a>
                            </li>

                            <li>
                                <a data-modal-toggle="deleteUserModal{{ $i->id }}" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>


                    <div class="gap-8 sm:grid sm:grid-cols-1 mt-2">
                        <div class="mb-4 mt-[-50px]">
                            <img class="object-center object-cover rounded-full h-28 w-28" src="/storage/images/{{ $link[2] }}" alt="photo">
                            <p class="dark:text-white text-indigo-600 font-bold capitalize text-center">
                                {{ $i->name . ' ' . $i->surname }}
                            </p>
                            <p class="text-xs dark:text-white text-indigo-600 capitalize text-center">
                                {{ $i->interviewee_type->name }}
                            </p>
                        </div>
                    </div>

                    <div class="flex items-center min-w-0 mb-10">
                        <p class="font-medium text-gray-900 dark:text-white mr-2">
                            Email:
                        </p>
                        <p class="text-sm text-gray-500 truncate dark:text-gray-400">
                            {{ $i->email }}
                        </p>
                    </div>

                    <div class="flex items-center w-full mb-3">
                        @foreach ($exec1 as $rat => $dd)
                            @if ($dd->candidate_id === $i->id)
                        <p class="bg-blue-100 text-blue-800 text-sm font-semibold inline-flex items-center p-1 rounded dark:bg-blue-200 dark:text-blue-800">{{ floatval($dd->rating) }}</p>
                        <p class="ml-2 font-medium text-gray-900 dark:text-white">Rating</p>
                        <span class="mx-2 w-1 h-1 bg-gray-900 rounded-full dark:bg-gray-500"></span>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">376 reviews</p>
                                @break
                            @endif
                        @endforeach
                            @if(!($dd->candidate_id === $i->id))
                        <p class="bg-blue-100 text-blue-800 text-sm font-semibold inline-flex items-center p-1 rounded dark:bg-blue-200 dark:text-blue-800"></p>
                        <p class="ml-2 font-medium text-gray-900 dark:text-white">Not Yet Rated</p>
                        <span class="mx-2 w-1 h-1 bg-gray-900 rounded-full dark:bg-gray-500"></span>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">0 reviews</p>
                            @endif
                    </div>

                    <div class="grid grid-cols-1 grid-rows-3 gap-x-8 gap-y-2 w-full ">
                        @foreach ($i->interviewee_type->interviewee_attributes as $attribute)
                        <dl>
                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                                {{ $attribute->name }}
                            </dt>

                            @php

                            $total = 0;
                            $index = 0;
                            $rate = 'No Rating';

                            foreach($review_attributes as $review_attribute){
                                if( $review_attribute->candidate_id == $i->id && $review_attribute->attribute_id == $attribute->id){

                                    $total += $review_attribute->rating_amount;
                                    $index++;
                                }
                            }

                            if($index != 0){

                                $rate = $total/$index;
                                floatval($rate);
                            }
                        @endphp

                            <dd class="flex items-center mb-3">
                                <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                    <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: {{($rate == 'No Rating' ? 0 : round(floatval($rate), 1)) * 10 }}%"></div>
                                </div>
                                <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{round(floatval($rate), 1)}}</span>
                            </dd>
                                
                        </dl>
                        @endforeach
                    </div>

                    <div class="flex flex-row">
                        <div class="mt-5">
                            <button type="button" data-modal-toggle="defaultModal{{ $i->id }}" class="px-[10px] bg-blue-500 hover:bg-blue-700 text-white p-1 rounded-lg">Show CV</button>
                        </div>

                        <div class="mt-5 pl-5">
                            <a href="{{ $i -> external_cv_path }}"><button type="button" class="px-[10px] bg-blue-500 hover:bg-blue-700 text-white p-1 rounded-lg">External Link</button> </a>

                        </div>
                    </div>
                </div>

                <div id="defaultModal{{ $i->id }}" tabindex="-1" class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    CV
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{ $i->id }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            <div class="p-6 space-y-6">
                                <iframe class="w-full" src={{ '/storage/cv_path/' . $cv[2] }} height="600px">
                                </iframe>
                            </div>


                        </div>
                    </div>
                </div>
                <div id="deleteUserModal{{ $i->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="deleteUserModal{{ $i->id }}">
                                <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                            <div class="p-6 text-center">
                                <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                    you sure you want to delete this?</h3>
                                <a href="{{ route('interviewees.destroy', $i->id) }}">
                                    <button data-modal-toggle="deleteUserModal{{ $i->id }}" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                </a>
                                <button data-modal-toggle="deleteUserModal{{ $i->id }}" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600" data-modal-toggle="deleteUserModal{{ $i->id }}">No,
                                    cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="editModal{{ $i->id }}" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">

                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">


                            <form method="POST" action="{{ route('interviewees.update',$i->id) }}" enctype="multipart/form-data" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                @csrf
                                <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="editModal{{ $i->id }}">
                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                                <div class="p-6 text-center">
                                    <div class="flex">
                                        <div class="m-1">
                                            <label for="name" class="float-left block m-2 text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input type="text" name="name" id="name" autocomplete="given-name" class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ $i->name }}" required>

                                            @error('name')
                                            <div class="ml-1 text-red-500 text-sm alert alert-danger">{{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="m-1">
                                            <label for="name" class="float-left block m-2 text-sm font-medium text-gray-900 dark:text-white">Surname</label>
                                            <input type="text" name="surname" id="name" autocomplete="given-name" class="@error('surname') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ $i->surname }}" required>
                                            @error('surname')
                                            <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="name" class="float-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="email" name="email" id="email" autocomplete="given-name" class="@error('email') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" value="{{ $i->email }}" required>
                                        @error('surname')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="name" class="float-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Insert
                                            CV</label>
                                        <input type="file" name="cv_path" id="cv_path" autocomplete="given-name" class="@error('cv_path') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="cv_path">
                                        <a href="/storage/cv_path/{{ $cv[2] }}" download class="underline">Download the Current CV</a>
                                        @error('cv_path')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="name" class="float-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">External
                                            CV</label>
                                        <input type="text" name="external_cv_path" id="name" autocomplete="given-name" class="@error('external_cv_path') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Interviewee Type Name" value="{{ $i->external_cv_path }}" required>
                                        @error('external_cv_path')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="name" class="float-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interviewee
                                            Attributes</label>
                                        <select class="@error('interviewee_types_id') is-invalid @enderror  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="interviewee_types_id" id="interviewee_types_id">
                                            <option value="{{ $i->interviewee_type->id }}">
                                                {{ $i->interviewee_type->name }}
                                            </option>
                                            @foreach ($intervieweesT as $a)
                                            @if ($a->id !== $i->interviewee_type->id)
                                            <option value="{{ $a->id }}">{{ $a->name }}</option>
                                            @endif
                                            @endforeach

                                        </select>
                                        @error('interviewee_types_id')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="name" class="float-left block mb-2 text-sm font-medium text-gray-900 dark:text-white">Insert
                                            Image</label>
                                        <input type="file" name="img" id="img" autocomplete="given-name" class="@error('img') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">

                                        @error('img')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}
                                        </div>
                                        @enderror
                                    </div>
                                    <p class="float-left m-1">Current Image</p>
                                    <img class="mt-2" src="/storage/images/{{ $link[2] }}" width="70px" height="70px">

                                </div>
                                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                    <button type="submit" data-modal-toggle="editModal{{ $i->id }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                                </div>
                            </form>
                        </div>
                    </div>


                </div>
                @endforeach
                <div id="addUserModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">

                        <form method="POST" action="{{ route('interviewees.store') }}" enctype="multipart/form-data" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            @csrf

                            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Candidate
                                </h3>
                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="addUserModal">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>

                            <div class="p-6 space-y-6">
                                <div class="space-y-6">
                                    <div class="flex">
                                        <div class="m-1">
                                            <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                            <input type="text" name="name" id="name" autocomplete="given-name" class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Name" required>
                                            @error('name')
                                            <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="m-1">
                                            <label for="name" class="block  text-sm font-medium text-gray-900 dark:text-white">Surname</label>
                                            <input type="text" name="surname" id="surname" autocomplete="given-name" class="@error('surname') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Surname" required>

                                            @error('surname')
                                            <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div>
                                        <label for="email" class="block  text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                        <input type="email" name="email" id="email" autocomplete="given-email" class="@error('email') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Email" required>

                                        @error('surname')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Insert CV</label>
                                        <input type="file" name="cv_path" id="cv_path" autocomplete="given-name" class="@error('cv_path') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="cv_path" required>
                                        @error('cv_path')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                        @enderror



                                    </div>
                                    <div>
                                        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">External CV
                                            Path</label>
                                        <input type="text" name="external_cv_path" id="name" autocomplete="given-name" class="@error('external_cv_path') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="External CV Path" required>
                                        @error('external_cv_path')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="name" class="block  text-sm font-medium text-gray-900 dark:text-white">Interviewee
                                            Types</label>

                                        <select class="@error('interviewee_types_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="interviewee_types_id" id="interviewee_types_id">
                                            @foreach ($intervieweesT as $i)
                                            <option value="{{ $i->id }}">{{ $i->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('interviewee_types_id')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div>

                                    </div>
                                    <div>

                                        <label for="name" class="block text-sm font-medium text-gray-900 dark:text-white">Insert Image</label>
                                        <input type="file" name="img" id="img" autocomplete="given-name" class="@error('img') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" required>
                                        @error('img')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                        @enderror

                                    </div>
                                </div>

                                <div class=" flex items-center space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                    <button type="submit" data-modal-toggle="addUserModal" class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                                </div>
                        </form>
                    </div>

                </div>

            </div>
        </section>
    </div>
    <div class="dark:bg-gray-800 p-3 flex justify-center">
        {{ $intervieweesA->links() }}
    </div>
</div>
@endsection('content')