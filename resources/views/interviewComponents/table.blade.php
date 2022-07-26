@extends('layouts.layout')

@section('content')

<title>Interview</title>
<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    <div class="mt-[145px] mx-4">
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full rounded">
                    <caption
                        class="p-5 relative text-lg font-semibold text-left  text-black border-b dark:border-gray-700 bg-gray-50 dark:text-white dark:bg-gray-900">
                        Interview
                        <p class="mt-1 text-sm font-normal text-black dark:text-white ">Browse a list of Interviewee Types products
                            designed to help you work, grow your business, and more. (Fix this text)</p>
                        <a class="absolute top-4 right-6" href="#">
                            <button type="button" data-modal-toggle="addUserModal"
                                class="bg-blue-500 hover:bg-blue-700 text-white p-1 rounded">Create</button>
                        </a>
                    </caption>
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-black uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-white dark:bg-gray-900"> 
                           
                            <th class="px-4 py-3">Interviewer</th>
                            <th class="px-4 py-3">Candidate</th>
                            <th class="px-4 py-3">Date</th>
                            <th class="px-4 py-3">Candidate Types</th>
                            <th class="px-4 py-3">Candidate Attribute</th>
                            <th class="px-4 py-3">CV</th>
                            <th class="px-4 py-3">Edit</th>
                            <th class="px-4 py-3">Delete</th>                      
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @foreach ($interview as $i)
                        @php
                        
                        $link = explode('/', $i->interviewees->img);
                        $cv = explode('/', $i->interviewees->cv_path);
                    @endphp
                            <tr class="bg-gray-50 dark:bg-gray-900 hover:bg-gray-100 dark:hover:bg-gray-900 text-black dark:text-white">

                             
                                <td class="px-4 py-3 text-sm ">
                                    {{ $i->user->name }}
                                </td>
                                
                                <td class="px-4 py-3 text-sm capitalize">
                                    {{ $i->interviewees->name . ' ' . $i->interviewees->surname }}
                                </td>
                                <td class="px-4 py-3 text-sm capitalize">
                                    {{ $i->interview_date }}
                                </td>
                             
                                <td class="px-4 py-3 text-sm capitalize">
                                {{ $i->interviewees->interviewee_type->name }}
                                </td>
                                <td class="px-4 py-3 text-sm capitalize">
                                    @foreach ($exec as $a)
                                    @if ($i->interviewees->interviewee_type->name === $a->name)
                                        {{ $a->Attributes }}
                                    @endif
                                @endforeach
                                    </td>
                                    <td class="px-4 py-3 text-sm capitalize ">
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
                                <td class="px-4 py-3 text-xs">
                                   
                                    <a href="#" data-modal-toggle="editModal{{ $i->id }}"
                                        class="text-blue-600 font-bold rounded">Edit</a>
                                    
                                </td>
                                <td class="px-4 py-3 text-xs">
                                    <a href="#" data-modal-toggle="deleteUserModal{{ $i->id }}"
                                        class="text-red-600 font-bold rounded">Delete</a>
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
                                                you sure you want to delete this interview?</h3>
                                            <a href="{{  route('interview.destroy', $i->id) }}">
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

                                    <form method="POST"  action="{{ route('interview.update', $i->id) }}"
                                        class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        @csrf

                                        <div
                                            class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                Interviewer:
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
                                            <div class="p-6 space-y-6">
                                                <div class="space-y-6">
                                                    <div>
                            
                                                        <input type="hidden" name="interview_id" id="interview_name"
                                                            value="{{ empty($interviewss->last()->interview_id) ? '1' : ++$interviewss->last()->interview_id }}"
                                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                            required>
                            
                                                    </div>
                                                    <div>
                                                        <label class="block text-sm font-medium text-gray-900 dark:text-white">Choose interviewers</label>
    
                                                        <select name="interviewer"
                                                        class="@error('interviewer') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                        id="interviewer">
                                                        <option value="{{ $i->user->id }}">{{ $i->user->name }}</option>
                                                        @foreach ($admin as $a)
                                                            @if ($a->id !== $i->interviewer)
                                                                <option value="{{ $a->id }}">{{ $a->name }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                  
                                                        @error('interviewer')
                                                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                </div>
                            
                                                <div>
                                                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Choose candidate</label>
                            
                                                    <select name="interviewees_id"
                                                        class="@error('interviewees_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                                        id="interviewees_id">
                                                        <option value="{{ $i->interviewees->id }}">
                                                            {{ $i->interviewees->name . ' ' . $i->interviewees->surname }}</option>
                                                        @foreach ($interviewee as $a)
                                                            @if ($i->interviewees->id !== $a->id)
                                                                <option value="{{ $a->id }}">{{ $a->name . ' ' . $a->surname }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>

                                                    @error('interviewees_id')
                                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                    @enderror
                                                </div>
                            
                            
                                                <label class="block text-sm font-medium text-gray-900 dark:text-white">Choose date</label>
                                                <input value={{$i->interview_date}} type="date" name="interview_date" min=<?php echo date('Y-m-d'); ?> id="dateId"
                                                   class="@error('interview_date') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" />
                            
                                                @error('interview_date')
                                                <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                                @enderror
                            
                                             
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
            
           
            <div class=" bg-gray-100 dark:bg-gray-800 p-3 ">
                <a class="underline" href="{{route('public.index')}}">See all interviews</a>
                {{$interview->links() }}
            </div>
        </div>
    </div>
    <div id="addUserModal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">
      
            <form method="POST" action="{{ route('interview.store') }}"
                class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                @csrf
            
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Interview
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

                            <input type="hidden" name="interview_id" id="interview_name"
                                value="{{ empty($interviewss->last()->interview_id) ? '1' : ++$interviewss->last()->interview_id }}"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                required>

                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-900 dark:text-white">Choose interviewers</label>

                            <select name="interviewer[]"
                                class="@error('interviewer') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                id="interviewer" multiple="multiple">
                                @foreach ($admin as $a)
                                    <option value="{{ $a->id }}">  
                                        {{ $a->name }}</option>
                                @endforeach
                            </select>
                        
                            @error('interviewer')
                            <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                            @enderror
                            
                        </div>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-900 dark:text-white">Choose candidate1</label>

                        <select name="interviewees_id"
                            class="@error('interviewees_id') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                            id="interviewees_id">
                            @foreach ($interviewee as $a)
                                <option value="{{ $a->id }}">{{ $a->name. " " . $a->surname  }}</option>
                            @endforeach
                        </select>
                        @error('interviewees_id')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <label class="block text-sm font-medium text-gray-900 dark:text-white">Choose date</label>
                    <input type="datetime-local" name="interview_date" min=<?php echo date('Y-m-d').'T00:00'; ?> id="dateId"
                        class="@error('interview_date') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white ">

                    @error('interview_date')
                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                    @enderror


                </div>


          
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600" id="create-btn">
                    <button type="submit"  data-modal-toggle="defaultModal"
                        class="text-white bg-gradient-to-r from-blue-500 via-blue-600 to-blue-700 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 w-[150px] h-[50px] save-btn">Create</button>
  
</div>
            </form>
          
 <script>
    save_btn = document.querySelector(".save-btn");
save_btn.onclick = function() {
  this.innerHTML="<div class='flex mb-4 w-auto'><div class='loader'></div><p class='mb-10 text-xs'>Creating Interview...</p></div>";

setTimeout(() => {
    this.innerHTML = "<div class='flex items-center justify-center gap-2'><svg class='w-6 h-6 ' fill='none' stroke='currentColor' viewBox='0 0 24 24' xmlns='http://www.w3.org/2000/svg'><path stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'><p>Interview Created</p></path></svg></div>";
  
  
this.style = "padding-top: 0.625rem;padding-bottom: 0.625rem; width:auto; padding-left: 1.25rem;padding-right: 1.25rem; margin-right: 0.5rem; margin-bottom: 0.5rem; background-color: linear-gradient(to right, var(--tw-gradient-stops)); background-color: #34D399; background-color: #10B981; background-color: #059669; color: #ffffff; font-size: 0.875rem;line-height: 1.25rem; font-weight: 500; text-align: center; border-radius: 0.5rem;";
},7000);
}
    </script>
           <style>
        
  .loader{
    display:flex;
    align-items:center;
    justify-content:center;
    pointer-events: none;
    width: 30px;
    height: 30px;
    border-radius:50% ;
    border: 3px solid transparent;
    border-top-color:#fff ;
    animation: an1 1s ease infinite;
  }

  @keyframes an1 {
    0%{
      transform:rotate(0turn);
    }
    100%{
      transform: rotate(1turn);
    }
  }
            </style>
        </div>
    </div>
</div>


        </div>
</div>
@endsection('content')
