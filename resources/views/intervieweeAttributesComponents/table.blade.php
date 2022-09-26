@extends('layouts.layout')

@section('content')
<title>Interviewee Attribute</title>

<style>

    /*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: DodgerBlue !important; 

    
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}

</style>

    @if(Auth::user()->role==='admin')
    <div class="h-full ml-14 mt-14 mb-10 md:ml-64">
        <div class="mt-[145px] mx-4">
            <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                    <table class="w-full">
                        <caption
                            class="p-5 bg-gray-200 relative text-lg font-semibold text-left  text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            Interviewee Types
                            <p class="mt-1 text-sm font-normal text-gray-400">Browse a list of Interviewee Types products
                                designed to help you work, grow your business, and more. (Fix this text)</p>
                            <a class="absolute top-4 right-6" href="#">
                                <button type="button" data-modal-toggle="addITypeModal"
                                class="bg-blue-500 hover:bg-blue-700 text-white p-1 rounded">Create</button>
                            </a>
                        </caption>
                        <thead>
                            <tr
                                class="text-xs bg-gray-200 font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Edit</th>
                                <th class="px-4 py-3">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-gray-200 divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($intervieweesT as $i)
                                <tr
                                    class="bg-gray-200 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">

                                    <td class="px-4 py-3 text-sm capitalize ">
                                        {{ $i->name }}
                                    </td>
                                    <td class="px-4 py-3 text-xs">




                                        <a href="#" data-modal-toggle="editModal{{ $i->id }}"
                                            class="text-blue-600 font-bold py-2 px-4 rounded">Edit</a>

                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                        <a href="#" data-modal-toggle="deleteITypeModal{{ $i->id }}"
                                            class="text-red-600 font-bold py-2 px-4 rounded">Delete</a>
                                    </td>

                                </tr>
                                <div id="deleteITypeModal{{ $i->id }}" tabindex="-1"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <button type="button"
                                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                                data-modal-toggle="deleteITypeModal{{ $i->id }}">
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
                                                    you sure you want to delete this??</h3>
                                                <a href="{{ route('interviewee.destroy', $i->id) }}">
                                                    <button data-modal-toggle="deleteITypeModal{{ $i->id }}"
                                                        type="button"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                        Yes, I'm sure
                                                    </button>
                                                </a>
                                                <button data-modal-toggle="deleteITypeModal{{ $i->id }}"
                                                    type="button"
                                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                                    data-modal-toggle="deleteITypeModal{{ $i->id }}">No,
                                                    cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div id="editModal{{ $i->id }}" tabindex="-1" aria-hidden="true"
                                    class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                                    <div
                                        class="relative p-4 w-full max-w-md h-full md:h-auto bg-white rounded dark:bg-gray-700">

                                        <form method="POST" action="{{ route('interviewee.update', $i->id) }}"
                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            @csrf

                                            <div
                                                class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Interviewee Type
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
                                                            placeholder="Interviewee Type Name" value="{{ $i->name }}"
                                                            required>
                                                            
                                                            @error('name')
                                                            <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                        @enderror   

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
                    <div class="bg-gray-100 dark:bg-gray-800 p-3">
                    {{ $intervieweesT->appends(['intervieweesA'=>$intervieweesA->currentPage()])->links() }}
                </div>
                <div class="w-full overflow-x-auto mt-20">
                    <table class="w-full">
                        <caption
                            class="p-5 bg-gray-200 relative text-lg font-semibold text-left  text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                Candidate Attributes
                            <p class="mt-1 text-sm font-normal text-gray-400">Browse a list of Interviewee Types products
                                designed to help you work, grow your business, and more. (Fix this text)</p>
                            <a class="absolute top-4 right-6" href="#">
                                <button type="button" data-modal-toggle="addUserModal"
                                    class="bg-blue-500 hover:bg-blue-700 text-white p-1 rounded">Create</button>
                            </a>
                        </caption>
                        <thead>
                            <tr
                                class="text-xs bg-gray-200 font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                                <th class="px-4 py-3">Name</th>
                                <th class="px-4 py-3">Interviewee Type Name</th>
                                <th class="px-4 py-3">Edit</th>
                                <th class="px-4 py-3">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                            @foreach ($intervieweesA as $i)
                                <tr
                                    class="bg-gray-200 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                                    <td class="px-4 py-3 text-sm capitalize ">
                                        {{ $i->name }}
                                    </td>
                                    <td class="px-4 py-3 text-sm capitalize ">
                                        {{ $i->interviewee_type->name }}
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                       
                                          <a href="#" data-modal-toggle="editModal{{ $i->id }}"
                                            class="text-blue-600 font-bold py-2 px-4 rounded">Edit</a>
                                      
                                    </td>
                                    <td class="px-4 py-3 text-xs">
                                  
                                          <a href="#" data-modal-toggle="deleteUserModal{{ $i->id }}"
                                              class="text-red-600 font-bold py-2 px-4 rounded">Delete</a>
                                     
                                      </td>

                                </tr>
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
                                                    you sure you want to delete this candidate attribute?</h3>
                                                <a href="{{ route('intervieweeAttributes.destroy', $i->id) }}">
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

                                        <form method="POST" action="{{ route('intervieweeAttributes.update', $i->id) }}"
                                            class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            @csrf

                                            <div
                                                class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Candidate Attribute
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
                                                            placeholder="Candidate attribute name" value="{{ $i->name }}"
                                                            required>
                                                            @error('name')
                                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                    @enderror

                                                    </div>
                                                    <div>
                                                        <label for="INTERVIEWEE TYPE NAME	"
                                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interviewee
                                                            Type Name </label>

                                                        <select name="interviewee_type_id"
                                                            class="@error('interviewee_type_id') is-invalid @enderror capitalize  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white "
                                                            id="interviewee_type_id">
                                                            <option value="{{ $i->interviewee_type->id }}">{{ $i->interviewee_type->name }}</option>
                                                            @foreach ($intervieweesT as $a)
                                                                @if ($a->id !== $i->interviewee_type->id)
                                                                    <option value="{{ $a->id }}">{{ $a->name }}</option>
                                                                @endif
                                                            @endforeach
                                                        </select>
                                                        
                                                        @error('interviewee_type_id')
                                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                    @enderror 
                                                    </div>
                                                </div>
                                            </div>

                                            <div
                                                class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                                <button type="submit" data-modal-toggle="editModal{{ $i->id }}"
                                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="bg-gray-100 dark:bg-gray-800 p-3">
                {{ $intervieweesA->appends(['intervieweesT' => $intervieweesT->currentPage()])->links() }}
                </div>
                
                </div>    
            </div>
            <div id="addITypeModal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
            <div class="relative p-4 w-full max-w-md h-full md:h-auto">

                <form method="POST" action="{{ route('interviewee.store') }}"
                    class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    @csrf

                    <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Interviewee Type
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-toggle="addITypeModal">
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
                                <input type="text" name="name" id="name" autocomplete="given-name"
                                    class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="Interviewee Type Name" required>
                                    @error('name')
                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                    @enderror 
                            </div>
                        </div>
                    </div>

                    <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                        <button type="submit" data-modal-toggle="addITypeModal"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                    </div>
                </form>
            </div>
        </div>
            <div id="addUserModal" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                <div class="relative p-4 w-full max-w-md h-full md:h-auto">

                    <form method="POST" autocomplete="off" action="{{ route('intervieweeAttributes.store') }}"
                        class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                        @csrf

                        <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                Candidate Attribute
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
                                        <div class="autocomplete" style="width:300px;">
                                            <input id="myInput" type="text" name="name" placeholder="Candidate Attribute Name" class="@error('name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block dark:text-white w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        placeholder="Candidate attribute name" required>
                                        </div>
                                        
                                        @error('name')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                </div>
                                <div>
                                    <label for="INTERVIEWEE TYPE NAME"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interviewee
                                        Type Name </label>
                                    <select name="interviewee_type_id"
                                        class="@error('interviewee_type_id') is-invalid @enderror capitalize  bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white "
                                        id="interviewee_type_id">
                                        @foreach ($intervieweesT as $i)
                                            <option value="{{ $i->id }}">{{ $i->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('interviewee_type_id')
                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                @enderror 
                                </div>
                            </div>
                        </div>

                        <div
                            class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                            <button type="submit" data-modal-toggle="addUserModal"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Create</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

    </div>
    @else

            <!-- <script>     window.location = "/dashboard";   </script> -->



    @endif
                <script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          b.setAttribute("class", "bg-white dark:bg-gray-600");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}

/*An array containing all the country names in the world:*/
var programming_languages = ["Ada","ALGOL","APL","Assembly","BASIC","C", "CSS", "C++","C#","COBOL", "Dart", "Erlang","Forth","Fortran","Go","Haskell", "HTML", "Io", "Java","JavaScript","Kotlin","Lisp","Lua","ML", "NASM", "Oberon", "Pascal","Perl","PHP","Prolog","Python","R","Ruby","Rust","SQL","Shell","Simula","Smalltalk","Swift","UNITY","Vala","Winbatch","Wolfram Language","WATFOR"];

/*initiate the autocomplete function on the "myInput" element, and pass along the programming_languages array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), programming_languages);
</script>

@endsection('content')
