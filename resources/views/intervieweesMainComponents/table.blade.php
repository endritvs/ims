@extends('layouts.layout')

@section('content')
    <div class="mx-6 overflow-x-auto relative shadow-md sm:rounded-lg container mx-auto">
        <a class="absolute top-4 right-6" href="#">
          <button type="button" data-modal-toggle="addUserModal" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Create</button>
        </a>
        <div id="addUserModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
            
            <form method="POST" action="{{ route('interviewees.store') }}" enctype="multipart/form-data"
                class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                @csrf
                
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
               
                <div class="p-6 space-y-6">
                    <div class="space-y-6">
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-300">Name</label>
                            <input type="text" name="name" id="name" autocomplete="given-name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Name" required>
                        </div>
                        <div>
                            <label for="name"
                                class="block  text-sm font-medium text-gray-900 dark:text-gray-300">Surname</label>
                            <input type="text" name="surname" id="surname" autocomplete="given-name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="Surname" required>
                        </div>
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-300">Insert CV</label>
                            <input type="file" name="cv_path" id="cv_path" autocomplete="given-name"
                                class="bg-gray-50 " placeholder="cv_path" required>
                        </div>
                        <div>
                            <label for="name"
                                class="block text-sm font-medium text-gray-900 dark:text-gray-300">External CV Path</label>
                            <input type="text" name="external_cv_path" id="name" autocomplete="given-name"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                placeholder="External CV Path" required>
                        </div>
                        <div>
                            <label for="name"
                                class="block  text-sm font-medium text-gray-900 dark:text-gray-300">Interviewee
                                Types</label>
                             <input type="text" name="interviewee_types_id" id="name" autocomplete="given-name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="Interviewee Types" required> 
                            <select class="@error('interviewee_types_id') is-invalid @enderror"
                                name="interviewee_types_id" id="interviewee_types_id">
                                @foreach ($intervieweesT as $i)
                                    <option value="{{ $i->id }}">{{ $i->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>

                        </div>
                        <div>
                            <label for="name"
                                class="block  text-sm font-medium text-gray-900 dark:text-gray-300">Insert Image</label>
                            <input type="file" name="img" id="img" autocomplete="given-name"
                                class="bg-gray-50 " placeholder="cv_path" required>
                        </div>

                    </div>
                </div>
               
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button type="submit" data-modal-toggle="addUserModal"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                </div>
            </form>
        </div>
        </div>
                @foreach ($intervieweesA as $i)
                    @php
                        
                        $link = explode('/', $i->img);
                        $cv = explode('/', $i->cv_path);
                    @endphp

                    <div class="relative  mx-auto w-fit mt-6 min-w-0 break-words bg-gray-900 w-[36%] mb-6 shadow-lg  rounded-xl mt-16 h-fit pb-8 hover:scale-105 hover:drop-shadow-[0_30px_30px_rgba(0,0,0,0.25)] hover:ease-in-out duration-300">
                      <div class="flex justify-end px-4 pt-4">
        <button id="dropdownButton" data-dropdown-toggle="dropdown" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
            <span class="sr-only">Open dropdown</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
        </button>
        <!-- Dropdown menu -->
        <div id="dropdown" class="hidden z-10 w-44 text-base list-none bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700">
            <ul class="py-1" aria-labelledby="dropdownButton">
            <li>
                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Edit</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-sm text-gray-700 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Export Data</a>
            </li>
            <li>
                <a href="#" class="block py-2 px-4 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
            </li>
            </ul>
        </div>
    </div>
    <div class="px-6">
        <div class="w-full flex justify-center pb-10 relative">
        <img src="/storage/images/{{ $link[2] }}" width="50px" height="50px" alt="" class="rounded-full w-20 h-20 absolute mt-[-35px] object-cover">
        </div>
            <div class="text-center mt-2">

            <h3 class="text-2xl text-slate-100 font-bold leading-normal mb-1">{{ $i->name }} {{ $i->surname }}</h3>
          
            <div class="text-xs mt-0 mb-2 text-blue-600 font-extrabold text-base justify-center">
                <i class="fas fa-map-marker-alt mr-2 opacity-75 text-center"></i> {{ $i->interviewee_type->name }}
            </div>

            </div>
        
            <div class="flex items-center justify-center">
            <svg aria-hidden="true" class="w-7 h-7 text-blue-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-7 h-7 text-blue-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Second star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-7 h-7 text-blue-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Third star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-7 h-7 text-blue-600" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fourth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            <svg aria-hidden="true" class="w-7 h-7 text-gray-300 dark:text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Fifth star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            </div>

            <div class="mt-6 py-3 border-t border-slate-200 text-center">
            <div class="flex flex-wrap justify-center flex-row flex-wrap">
                <div class="w-full px-4 ">
                   
                    
                    
                    <h4 class="flex ml-2 flex-wrap justify-left text-slate-100 font-semibold">Attributes:</h4>
                  <div class="flex flex-row flex-wrap pb-16">
                  @foreach ($i->interviewee_type->interviewee_attributes as $attribute)
                    <span class="flex flex-wrap pl-2 pr-2 py-2 m-1 items-center text-sm font-medium rounded-xl cursor-pointer border-white-600 border-2 text-gray-200 hover:bg-blue-600 hover:text-gray-100 dark:bg-gray-700 dark:text-gray-200 dark:hover:bg-gray-800 dark:hover:text-gray-100 text-center max-w-fit  text-center justify-center  min-w-[60px]">{{ $attribute->name }}</span>

                    
                  @endforeach

                  </div class="flex flex-row flex-wrap pb-16">             
                    <div class=" mb-[-60px]">
                    <a href="/storage/cv_path/{{ $cv[2] }}" download>
                       <button href="javascript:;"class="rounded-full bg-blue-600 px-5 py-2 font-bold text-slate-100 hover:text-slate-100 text-sm">Download CV</button> </a>
                   
                    <a href="{{ $i -> external_cv_path }}">
                       <button href="javascript:;"class="rounded-full bg-blue-600 px-5 py-2 font-bold text-slate-100 hover:text-slate-100 text-sm">External Link</button> </a>
                    </div>
                </div>

                  @endforeach
                  
                
                
            </div>
        </div>
    </div>
</div>
                    
                    
@endsection('content')
