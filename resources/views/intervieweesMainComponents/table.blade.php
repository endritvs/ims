@extends('layouts.layout')

@section('content')
    <title>Candidates</title>
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class="mt-4 mx-4">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
                <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <caption
                            class="p-5 relative text-lg font-semibold text-left  text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            Candidates
                            <p class="mt-1 text-sm font-normal text-gray-400">Browse a list of Interviewee Types products
                                designed to help you work, grow your business, and more. (Fix this text)</p>
                            <a class="absolute top-4 right-6" href="#">
                                <button type="button" data-modal-toggle="addUserModal"
                                class="bg-blue-500 hover:bg-blue-700 text-white p-1 rounded">Create</button>
                            </a>
                        </caption>
                        <thead>

                            <tr
                                class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Surname</th>
                                <th class="px-4 py-3">CV</th>
                                <th class="px-4 py-3">CV</th>
                                <th class="px-4 py-3">CV Path</th>
                                <th class="px-4 py-3">Interviewee Type</th>
                                <th class="px-4 py-3">Interviewee Attributes</th>
                                <th class="px-4 py-3">Image</th>
                                <th class="px-4 py-3">Edit</th>
                                <th class="px-4 py-3">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">

                            @foreach ($intervieweesA as $i)

                                @php
                                    
                                    $link = explode('/', $i->img);
                                    $cv = explode('/', $i->cv_path);
                                @endphp
                   
                                <tr
                                    class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                
                                    <td class="px-4 py-3 text-sm capitalize ">
                                        {{ $i->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm capitalize ">
                                        {{ $i->surname }}
                                    </td>
                                    <td class="px-4 py-3 text-sm capitalize">
                                        <a href="/storage/cv_path/{{ $cv[2] }}" download>
                                            <button
                                                class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                                                <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                                    viewBox="0 0 20 20">
                                                    <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                                </svg>
                                                <span> Download CV</span>
                                            </button>
                                        </a>
                                    </td>
                                    <td class="px-4 py-3 text-sm capitalize">
                                        <button type="button" data-modal-toggle="defaultModal{{$i->id}}"
                                            class="bg-gray-500 hover:bg-gray-700 text-white p-1 rounded">See CV</button>
                                    </td>
                                    <td class="px-4 py-3 text-sm capitalize ">
                                        <a href="{{ $i->external_cv_path }}">External Link</a>
                                    </td>
                                    <td class="px-4 py-3 text-sm capitalize ">
                                        {{ $i->interviewee_type->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm capitalize ">
                                        @foreach ($i->interviewee_type->interviewee_attributes as $attribute)
                                            {{ $attribute->name }}
                                        @endforeach
                                    </td>
                                    <td class="px-4 py-3 text-sm capitalize ">
                                        <img src="/storage/images/{{ $link[2] }}" width="50px" height="50px">
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <a href="#" data-modal-toggle="editModal{{ $i->id }}"
                                            class="text-blue-600 font-bold py-2 px-4 rounded">Edit</a>
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <a href="#" data-modal-toggle="deleteUserModal{{ $i->id }}"
                                            class="text-red-700 font-bold py-2 px-4 rounded">Delete</a>
                                    </td>

                                </tr>
                                <div id="defaultModal{{$i->id}}" tabindex="-1" class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
                                    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    CV
                                                </h3>
                                                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{$i->id}}">
                                                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-6 space-y-6">
                                              <iframe class="w-full" src={{ "/storage/cv_path/".$cv[2] }} height="600px">
                                              </iframe>
                                            </div>
                                            <!-- Modal footer -->
                                          
                                        </div>
                                    </div>
                                </div>
                       
                                <div id="deleteUserModal{{ $i->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
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
                                                    class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200"
                                                    fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                        d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                </svg>
                                                <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are
                                                    you sure you want to delete this Interviewee Attribute?</h3>
                                                <a href="{{ route('interviewees.destroy', $i->id) }}">
                                                    <button data-modal-toggle="deleteUserModal{{ $i->id }}"
                                                        type="button"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yes, I'm sure
                                                    </button>
                                                </a>
                                                <button data-modal-toggle="deleteUserModal{{ $i->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                                    data-modal-toggle="deleteUserModal{{ $i->id }}">No,
                                                    cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                


                                <div id="editModal{{ $i->id }}" tabindex="-1" aria-hidden="true"
                                    class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                    <div
                                        class="relative p-4 w-full max-w-md h-full md:h-auto bg-white rounded dark:bg-gray-700">

                                        <form method="POST" action="{{ route('interviewees.update',$i->id) }}" enctype="multipart/form-data"
                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            @csrf

                                            <div
                                                class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Candidate
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-toggle="editModal{{ $i->id }}">
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
                                                            class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                          value="{{ $i->name }}"
                                                            required>
                                                          
                                                            @error('name')
                                                                <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                            @enderror 

                                                    </div>
                                                    <div>
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Surname</label>
                                                        <input type="text" name="surname" id="name"
                                                            autocomplete="given-name"
                                                            class="@error('surname') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                            value="{{ $i->surname }}"
                                                            required>
                                                            @error('surname')
                                                            <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                        @enderror 

                                                    </div>
                                                    <div>
                  
                                                  
                                                        <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Insert CV</label>
                                                            <input type="file" name="cv_path" id="cv_path" autocomplete="given-name"
                                    class="@error('cv_path') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="cv_path">
                                                <a href="/storage/cv_path/{{$cv[2]}}" download class="underline">Download the Current CV</a>
                                                    @error('cv_path')
                                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                @enderror 
                                                  
                                                    <div>
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">External CV</label>
                                                        <input type="text" name="external_cv_path" id="name"
                                                            autocomplete="given-name"
                                                            class="@error('external_cv_path') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                            placeholder="Interviewee Type Name"
                                                            value="{{ $i->external_cv_path }}" required>
                                                            @error('external_cv_path')
                                                            <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                        @enderror 

                                                    </div>
                                                    <div>
                                                        <label for="name"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interviewee Attributes</label>
                                                            <select class="@error('interviewee_types_id') is-invalid @enderror  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="interviewee_types_id" id="interviewee_types_id">  
                                                                <option value="{{ $i->interviewee_type->id}}">{{ $i->interviewee_type->name}}</option>
                                                             @foreach ($intervieweesT as $a) 
                                                             @if($a->id!==$i->interviewee_type->id)
                                                             <option value="{{$a->id}}">{{$a->name}}</option>
                                                                  @endif
                                                             @endforeach
                                                             
                                                             </select>
                                                             @error('interviewee_types_id')
                                                             <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                         @enderror 

                                                    </div>
                                                    <div>
                                                        <label for="name"
                                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Insert Image</label>
                                                        <input type="file" name="img" id="img" autocomplete="given-name"
                                                        class="@error('img') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
                                                        
                                                        @error('img')
                                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                    @enderror 
                                                        Current Image
                                                        <img class="mt-2" src="/storage/images/{{ $link[2] }}" width="70px" height="70px">
                                                    </div>

                                                </div>
                                            </div>

                                            <div
                                                class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                <button type="submit" data-modal-toggle="editModal{{ $i->id }}"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                        


        
                         
                           
                            @endforeach
                        </tbody>
                    </table>

                </div>
                <div class="dark:bg-gray-800 p-3">
                    {{ $intervieweesA->links() }}
                </div>
            </div>
        </div>
        <div id="addUserModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">

                <form method="POST" action="{{ route('interviewees.store') }}" enctype="multipart/form-data"
                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    @csrf

                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Candidate
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
                                    class="block text-sm font-medium text-gray-900 dark:text-white">Name</label>
                                <input type="text" name="name" id="name" autocomplete="given-name"
                                    class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Name" required>
                                    @error('name')
                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                            <div>
                                <label for="name"
                                    class="block  text-sm font-medium text-gray-900 dark:text-white">Surname</label>
                                <input type="text" name="surname" id="surname" autocomplete="given-name"
                                    class="@error('surname') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Surname" required>
                                    
                                    @error('surname')
                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div>
                                <label for="email"
                                    class="block  text-sm font-medium text-gray-900 dark:text-white">Email</label>
                                <input type="text" name="email" id="email" autocomplete="given-email"
                                    class="@error('email') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Email" required>
                                    
                                    @error('surname')
                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>

                            <div >
                                <label for="name"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">Insert CV</label>
                                <input type="file" name="cv_path" id="cv_path" autocomplete="given-name"
                                    class="@error('cv_path') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="cv_path" required>
                                    @error('cv_path')
                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                @enderror 



                            </div>
                            <div>
                                <label for="name"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">External CV
                                    Path</label>
                                <input type="text" name="external_cv_path" id="name" autocomplete="given-name"
                                    class="@error('external_cv_path') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="External CV Path" required>
                                    @error('external_cv_path')
                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                            <div>
                                <label for="name"
                                    class="block  text-sm font-medium text-gray-900 dark:text-white">Interviewee
                                    Types</label>

                                <select
                                    class="@error('interviewee_types_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    name="interviewee_types_id" id="interviewee_types_id">
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
                            <div >

                                <label for="name"
                                    class="block text-sm font-medium text-gray-900 dark:text-white">Insert Image</label>
                                <input type="file" name="img" id="img" autocomplete="given-name"
                                    class="@error('img') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                     required>
                                    @error('img')
                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                @enderror

                            </div>
                        </div>

                        <div class=" flex items-center space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button type="submit" data-modal-toggle="addUserModal"
                                class="mt-2 text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                        </div>
                </form>
            </div>

        </div>
    </div>
@endsection('content')
