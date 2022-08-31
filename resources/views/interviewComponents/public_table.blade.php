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



                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($interview as $d)
                        @php
                            
                            $link = explode('/', $d['interviewees']['img']);
                            $cv = explode('/', $d['interviewees']['cv_path']);
                            $quest= explode(',', $d['user']['name']);
                        @endphp

                 

                        <div
                            class="w-full bg-gray-200 dark:bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">
                            {{-- <div class="text-center">


                                <p class="text-xl dark:text-white text-indigo-600 font-bold mb-2 capitalize">
                                    {{ $d['interviewees']['name'] . ' ' . $d['interviewees']['surname'] }}</p>
                                    <p class="text-base dark:text-white text-indigo-600 text-gray-400 font-normal capitalize">
                                        {{ $d['interviewees']['interviewee_type']['name'] }}</p>
                            </div> --}}
                            <div class="gap-8 sm:grid sm:grid-cols-2 mt-2">
                                <div class="mb-8">
                                    <img class="object-center object-cover rounded-full h-28 w-36"
                                        src="/storage/images/{{ $link[2] }}" alt="photo">
                                        <div class="text-center">


                                            <p class="dark:text-white text-indigo-600 font-bold capitalize">
                                                {{ $d['interviewees']['name'] . ' ' . $d['interviewees']['surname'] }}</p>
                                                <p class="text-xs dark:text-white text-indigo-600 text-gray-400 capitalize">
                                                    {{ $d['interviewees']['interviewee_type']['name'] }}</p>
                                        </div>
    
                                        <div class="flex items-center mt-5">
                                            <p
                                                class="bg-blue-100 text-blue-800 text-sm font-semibold inline-flex items-center p-1.5 rounded dark:bg-blue-200 dark:text-blue-800">
                                                8.7</p>
                                            <p class="ml-2 font-medium text-gray-900 dark:text-white">Excellent</p>
                                            <span class="mx-2 w-1 h-1 bg-gray-900 rounded-full dark:bg-gray-500"></span>
            
            
                                        </div>
                                </div>
                              
                                    <div class="sm:grid-cols-2 mt-2">
                                        <label class="dark:text-white text-indigo-600">Questioners:</label>
                                        @if (count($quest) > 1)
                                        @for ($i=0; $i<count($quest)-1; $i++)
                                        <div class="m-1 inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                                            <span data-popover-target="popover-default" class="font-medium text-gray-600 dark:text-white">{{substr($quest[$i],0,1)}}</span>
                                        </div>{{$quest[$i]}}
                                         @endfor
                                         @else
                                         @for ($i=0; $i<count($quest); $i++)
                                         <div class="m-1 inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                                             <span data-popover-target="popover-default" class="font-medium text-gray-600 dark:text-white">{{substr($quest[$i],0,1)}}</span>
                                         </div>{{$quest[$i]}}
                                          @endfor
                                          @endif
                                    </div>

                            </div>
                          
                            <div class="text-center">


                                {{-- <p class="text-xl dark:text-white text-indigo-600 font-bold mb-2 capitalize">
                                    {{ $d['interviewees']['name'] . ' ' . $d['interviewees']['surname'] }}</p> --}}
                                {{-- <p class="text-base dark:text-white text-indigo-600 text-gray-400 font-normal capitalize">
                                    {{ $d['interviewees']['interviewee_type']['name'] }}</p> --}}

                            </div>
                            <div class="grid grid-cols-2 gap-x-20 gap-y-7">
                                {{-- <div> --}}
                                    {{-- <label class="dark:text-white text-indigo-600">Attributes:</label>
                                    @foreach ($d['interviewees']['interviewee_type']['interviewee_attributes'] as $attribute)
                                        <p class="dark:text-base text-gray-400  font-normal capitalize">
                                            {{ $attribute['name'] }}</p>
                                    @endforeach --}}
                                {{-- </div> --}}
                                <div class="sm:grid-cols-2 mt-2">
                                    <label class="dark:text-white text-indigo-600">Attributes:</label>
                                    @foreach ($d['interviewees']['interviewee_type']['interviewee_attributes'] as $attribute)
                                  <dl>
                                      <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 capitalize">
                                          {{ $attribute['name'] }}</dt>
                                      <dd class="flex items-center mb-3">
                                          <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                              <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500"
                                                  style="width: 88%"></div>
                                          </div>
                                          <span
                                              class="text-sm font-medium text-gray-500 dark:text-gray-400">8.8</span>
                                      </dd>
                                  </dl>@endforeach
                                  
                              </div>
                                <div>
                                    <label class="dark:text-white text-indigo-600">Date:</label>
                                    <p class="text-base text-gray-400 font-normal"> {{ $d['interview_date'] }}</p>
                                </div>
                                {{-- <div>
                                    <label class="dark:text-white text-indigo-600">Questioners:</label>
                                    <p class="text-base text-gray-400 font-normal capitalize"> {{ $d['user']['name'] }}</p>
                                    <div class="flex-space-x-1 overflow-hidden">
                                    </div>

                                </div> --}}
                                <div>
                                    <label class="dark:text-white text-indigo-600">CV:</label>
                                    <button type="button" data-modal-toggle="defaultModal{{ $d['id'] }}"
                                        class="bg-gray-500 hover:bg-gray-700 text-white p-1 rounded">See CV</button>
                                </div>
                            </div>
                            <div class="mt-5">
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

                            </div>
                            {{-- <div class="flex items-center mt-5">
                                <p
                                    class="bg-blue-100 text-blue-800 text-sm font-semibold inline-flex items-center p-1.5 rounded dark:bg-blue-200 dark:text-blue-800">
                                    8.7</p>
                                <p class="ml-2 font-medium text-gray-900 dark:text-white">Excellent</p>
                                <span class="mx-2 w-1 h-1 bg-gray-900 rounded-full dark:bg-gray-500"></span>


                            </div>
                            <div class="gap-8 sm:grid sm:grid-cols-2 mt-2">
                                @foreach ($d['interviewees']['interviewee_type']['interviewee_attributes'] as $attribute)
                                    <div>
                                        <dl>
                                            <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 capitalize">
                                                {{ $attribute['name'] }}</dt>
                                            <dd class="flex items-center mb-3">
                                                <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                                    <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500"
                                                        style="width: 88%"></div>
                                                </div>
                                                <span
                                                    class="text-sm font-medium text-gray-500 dark:text-gray-400">8.8</span>
                                            </dd>
                                        </dl>
                                    </div>
                                @endforeach
                            </div> --}}
                        </div>
                        <div id="defaultModal{{ $d['id'] }}" tabindex="-1"
                            class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex"
                            aria-modal="true" role="dialog">
                            <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
                                <!-- Modal content -->
                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                    <!-- Modal header -->
                                    <div
                                        class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                            CV
                                        </h3>
                                        <button type="button"
                                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                            data-modal-toggle="defaultModal{{ $d['id'] }}">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                    </div>
                                    <!-- Modal body -->
                                    <div class="p-6 space-y-6">
                                        <iframe class="w-full" src={{ '/storage/cv_path/' . $cv[2] }} height="600px">
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
                <div>{{ $interview->links() }}</div>
                <div></div>
            </div>

        </div>
    </div>
@endsection('content')
