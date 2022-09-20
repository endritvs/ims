@extends("layouts.layout")

@section('content')

@include('components.reviewCard')
<title>My Reviews</title>
<link href="https://cdn.jsdelivr.net/npm/daisyui@2.24.0/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com"></script>
<div class="h-full ml-14  mb-10 md:ml-64">
    <div class="mt-[145px] mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
          <div class="w-full overflow-x-auto">
            <table class="w-full">
                <caption class="p-5 relative text-lg font-semibold text-left  text-gray-500 border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                    Your upcoming interviews
                    <p class="mt-1 text-sm font-normal text-gray-400">Browse a list of Interviewee Types products designed to help you work, grow your business, and more. (Fix this text)</p>
                   
                </caption>
              <thead>
                <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
               
                  <th class="px-4 py-3">Questioner</th>
                  <th class="px-4 py-3">Candidate</th>
                  <th class="px-4 py-3">Candidate Type</th>
                  <th class="px-4 py-3">Interview ID</th>
                  <th class="px-4 py-3">Rating</th>
                  <th class="px-4 py-3">Edit</th>
                  <th class="px-4 py-3">Delete</th>
                </tr>
              </thead>
              <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                @foreach ($review as $r) 
             
                <tr class="bg-gray-50 dark:bg-gray-800 hover:bg-gray-100 dark:hover:bg-gray-900 text-gray-700 dark:text-gray-400">
                 
                  <td class="px-4 py-3 text-sm capitalize ">
                    {{ $r->questionnaires->name }}
                  </td>
                  <td class="px-4 py-3 text-sm capitalize ">
                    {{ $r ->candidates->name." ".$r ->candidates->surname }}
                  </td>
                  <td class="px-4 py-3 text-sm capitalize ">
                    {{ $r ->candidates->interviewee_type->name}}
                  </td>
                  <td class="px-4 py-3 text-sm capitalize ">
                    {{ $r->interviews->interview_id}}
                  </td>
                  
                <td class="px-4 py-3 text-sm capitalize ">
                    @for ($i=0; $i<$r->rating_amount; $i++)
                    <input type="radio" disabled name="rating_amount" class="mask mask-star bg-orange-400" value="{{$r->rating_amount}}" />
        
                        @endfor 
                </td>
                <td class="px-4 py-3 text-sm capitalize ">
                    <a href="#" data-modal-toggle="editModal{{ $r->id }}"
                        class="text-blue-600 font-bold py-2 px-4 rounded">Edit</a>
                </td>
                <td class="px-4 py-3 text-sm capitalize ">
                    <a href="#" data-modal-toggle="deleteUserModal{{ $r->id }}"
                        class="text-red-600 font-bold py-2 px-4 rounded">Delete</a>
                </td>
              
                </tr>

                <div id="deleteUserModal{{ $r->id }}" tabindex="-1"
                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
                    <div class="relative p-4 w-full max-w-md h-full md:h-auto">
                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                            <button type="button"
                                class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white"
                                data-modal-toggle="deleteUserModal{{ $r->id }}">
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
                                    you sure you want to delete this?</h3>
                                <a href="{{ route('review.destroy', $r->id) }}">
                                    <button data-modal-toggle="deleteUserModal{{ $r->id }}"
                                        type="button"
                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                        Yes, I'm sure
                                    </button>
                                </a>
                                <button data-modal-toggle="deleteUserModal{{ $r->id }}"
                                    type="button"
                                    class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600"
                                    data-modal-toggle="deleteUserModal{{ $r->id }}">No,
                                    cancel</button>
                            </div>
                        </div>
                    </div>
                </div>


                
                <div id="editModal{{ $r->id }}" tabindex="-1" aria-hidden="true"
                    class=" hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
                    <div
                        class="relative p-4 w-full max-w-md h-full md:h-auto bg-white rounded dark:bg-gray-700">

                        <form method="POST" action="{{ route('review.update', $r->id) }}"
                            class="relative bg-white rounded-lg shadow dark:bg-gray-700" enctype="multipart/form-data">
                            @csrf

                            <div
                                class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                    Review
                                </h3>
                                <button type="button"
                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                    data-modal-toggle="editModal{{ $r->id }}">
                                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path fill-rule="evenodd"
                                            d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </button>
                            </div>

                            <div class="p-6 space-y-6">
                                
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Candidate</label>
                                    <input disabled type="text" name="name" id="name" autocomplete="given-name"
                                        class="@error('candidate_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        value="{{$r->questionnaires->name}}" required>
                                        @error('candidate_id')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                </div>

                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Questioner</label>
                                    <input disabled type="text" name="name" id="name" autocomplete="given-name"
                                        class="@error('candidate_id') is-invalid @enderror capitalize bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        value="{{$r->candidates->name}}" required>
                                        @error('candidate_id')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                </div>
                               
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Interview ID</label>
                                    <input disabled type="text" name="name" id="name" autocomplete="given-name"
                                        class="@error('candidate_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                        value="{{$r->interviews->interview_id}}" required>
                                        @error('candidate_id')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                </div>
                                <div>
                                    <label for="name"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Rating</label>
            
                                        <select class="@error('rating_amount') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" name="rating_amount" id="rating_amount">
                                            <option value="{{$r->rating_amount}}">{{$r->rating_amount}}</option>
                                            @for ($i=1; $i<6; $i++)
                                            @if ($r->rating_amount!==$i)                                       
                                            <option  value="{{$i}}">{{$i}}</option>
                                            @endif
                                            @endfor
                                            </select>
                                        @error('rating_amount')
                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                    @enderror 
                                </div>
                            </div>

                            <div
                                class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                                <button type="submit" data-modal-toggle="editModal{{ $r->id }}"
                                    class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Edit</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
           
            
              </tbody>
          </table>
          <div class=" bg-gray-100 dark:bg-gray-800 p-3">
            {{ $review->links() }}
        </div>
          </div>
        </div>
    </div>
  </div>


@endsection