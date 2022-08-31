@extends('layouts.layout')

@section('content')

<title>Interview</title>



<div class="h-full ml-14 mt-14 mb-10 md:ml-64">
    <div class="w-full bg-white dark:bg-gray-800 ">
        <section class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-4 py-12">
          
            <div class="text-center pb-12">
                <h2 class="text-base font-bold text-indigo-600">
                    STARLABS
                </h2>
                <h1 class="dark:text-white text-indigo-600 font-bold text-3xl md:text-4xl lg:text-5xl font-heading ">
                    Interview
                </h1>
            </div>
            
            
            <a class="absolute top-16 right-6" href="#">
                                <button type="button" data-modal-toggle="addUserModal"
                                class="bg-blue-500 hover:bg-blue-700 text-white p-1 rounded">Create</button>
                            </a>


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
                                    class="block text-sm font-medium text-gray-900 dark:text-white">External CV Path</label>
                                <input type="text" name="external_cv_path" id="name" autocomplete="given-name"
                                    class="@error('external_cv_path') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white"
                                    placeholder="External CV Path" required>
                                    @error('external_cv_path')
                                    <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                                @enderror 
                            </div>
                            <div>
                                <label for="name"
                                    class="block  text-sm font-medium text-gray-900 dark:text-white">Candidate
                                    Type</label>

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
        
            <div class=" grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
 
                @foreach ($intervieweesA as $i) 
                  
                @php
                                    $link = explode('/', $i->img);
                                    $cv = explode('/', $i->cv_path);
                                @endphp
            
                      
          
                  
                    <div class=" relative w-full bg-gray-200 dark:bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center hover:scale-105 hover:drop-shadow-[0_30px_30px_rgba(0,0,0,0.25)] hover:ease-in-out duration-300">
                      
                        <div class="mb-8">
                            <img class="object-center object-cover rounded-full h-36 w-36"
                                src="/storage/images/{{ $link[2] }}" alt="photo">
                            

                        </div>
                        
                        
                        <div class="text-center">
                        


                            <p class="text-xl dark:text-white text-indigo-600 font-bold mb-2 capitalize">
                                {{ $i->name . ' ' . $i->surname }}</p>
                            <p class="text-base dark:text-white text-indigo-600 text-gray-400 font-normal capitalize">
                                </p>
                             
                        </div>
                       
                        
                        <div class="grid grid-cols-2 gap-x-20 gap-y-7 mb-12">
                       
                        <div>
                            <label class="dark:text-white text-indigo-600">Attributes:</label>
                            @foreach ($i->interviewee_type->interviewee_attributes as $attribute)
                               <p  class="dark:text-base text-gray-400  font-normal capitalize"> {{ $attribute->name }}</p>
                            @endforeach
                            
                        </div>
                        
                        <div>
                          
                          <label class="dark:text-white text-indigo-600">Intw. Date:</label>
                          <p  class="text-base text-gray-400 font-normal"> {{ $i->interview_date }}</p>
                         
                        </div>
                        
                        

                        </div>
                        
                        <div class="flex flex-row absolute bottom-0.5 m-5 mb-1 " >
                            <a href="/storage/cv_path/{{ $cv[2] }}" download>
                                <button
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center text-sm">
                                    <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                                    </svg>
                                    <span> Download CV</span>
                                </button>
                            </a>
                            <a href="{{ $i -> external_cv_path }}">
                                <button
                                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center ml-5 text-sm">
                                    <i class="fa-solid fa-arrow-up-right-from-square pr-5"></i>
                                        
                                   
                                    <span> External Link </span>
                                </button>
                            </a>
                            </div>
                            </div>
                        
                            
                        </div>
                        
                    </div>
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
                    
                    
                @endforeach

            </div>
            

            

        </section>
        <div class="flex justify-evenly">
            <div></div>
            <div>{{ $intervieweesA ->links() }}</div>
            <div></div>
          </div>
        
    </div>
</div>
@endsection('content')
