@extends('layouts.layout')

@section('content')
<title>Interview</title>

<link href="https://cdn.jsdelivr.net/npm/daisyui@2.27.0/dist/full.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.tailwindcss.com/%22%3E"></script>

<div class="h-full ml-14 mt-8 mb-10 md:ml-64">
    <div class="w-full bg-white dark:bg-gray-800">
        <section class="max-w-6xl mx-auto pb-4 px-4 sm:px-6 lg:px-4 py-12">
            <div class="text-center">
                <h2 class="text-base font-bold text-indigo-600">
                    {{Auth::user()->company->company_name}}
                </h2>
                <h1 class="dark:text-white text-indigo-600 font-bold text-3xl md:text-4xl lg:text-5xl font-heading ">
                    Interview
                </h1>
                <a class="underline" href="{{ route('interview.index') }}">See all interviews</a>

                <div class="flex justify-evenly items-center pt-[67px] h-[156px]">
                    <form action="{{ route('public.index') }}" method="GET" role="search" class=" ">
                    <div class="flex justify-center ">
                        <div class="relative w-full">
                            <input type="search" id="search-dropdown" name="term" class="rounded block p-2.5 w-[720px] z-20 text-sm text-gray-900 bg-gray-50 rounded-r-lg border-l-gray-50 border-l-2 border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-l-gray-700  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:border-blue-500" placeholder="Search Mockups, Logos, Design Templates...">
                            <a href={{route('public.index')}}>
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
                   
                    <a class="mr-1 ml-auto"
                     
                     >Sort:
                     <form action="{{ route('public.sortRating') }}" method="GET" role="search" class="my-12">
                         <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 pr-4 mx-2">
                      <a class="cursor-pointer" href="#">Rating  
                       <i onclick="changeIconA(this)" class="fa-solid fa-arrow-up-long" id="SortNr"></i> 
                      </a> 
                     </button>
                     </form>
                     <form action="{{ route('public.sortDate') }}" method="GET" role="search" class="my-12">
                     <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 pr-4 mx-2">
                      <a class="pl-5 py-2.5 p-0 mr-2 mb-2" href="#">Date
                       <i onclick="changeIconB(this)" class="fa-solid fa-arrow-up-long" id="Date"></i>
                      </a>
                     </button>
                     </form>
                     <form action="{{ route('public.sort') }}" method="GET" role="search" class="my-12">
                     <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-2 py-2.5 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 pr-4 mx-2">
                      <a class="pl-5 py-2.5 p-0 mr-2 mb-2" href="#">A-Z
                       <i onclick="changeIconC(this)" class="fa-solid fa-arrow-up-long" id="AandZ"></i>
                      </a>
                     </button>
                     </form>

                    </a>
                    
                     
                </div>

                

            </div>



            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-6">

                @foreach ($interview as $d)

                @php

                $link = explode('/', $d['interviewees']['img']);
                $cv = explode('/', $d['interviewees']['cv_path']);
                $quest = explode(',', $d['user']['name']);
                $questID = explode(',', $d['user']['id']);

                @endphp



                <div class="w-full bg-gray-200 dark:bg-gray-900 rounded-lg sahdow-lg p-12 flex flex-col justify-center items-center">

                    <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots{{ $d['id'] }}" class="relative left-[145px] bottom-[30px] inline-flex items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-600" type="button">
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z">
                            </path>
                        </svg>
                    </button>


                    <div id="dropdownDots{{ $d['id'] }}" class="hidden z-10 w-44 bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                            <li>
                                <a data-modal-toggle="editModal{{ $d['id'] }}" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Comments</a>
                            </li>
                            <li>
                        @if (in_array(Auth::user()->id, $questID))
                                @if (App\Models\reviews_attributes::where('candidate_id', $d['interviewees']['id'] )->where('questionnaire_id', Auth::user()->id )->where('interview_id', $d['id'] )->exists())
                                    <a data-modal-toggle="editRateModal{{$d['id']}}" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-red-500 dark:hover:text-white"> 
                                       Edit Rating
                                    </a>
                                @else  
                                    <a data-modal-toggle="rateModal{{ $d['id'] }}" href="#" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Rate</a>
                             @endif
                        @endif
                            </li>
                        </ul>

                    </div>

                    <div class="gap-8 sm:grid sm:grid-cols-2 mb-4">
                        <div class="mb-2">
                            <img class="object-center object-cover rounded-full h-28 w-36" src="/storage/images/{{ $link[2] }}" alt="photo">
                            <div class="text-center">


                                <p class="dark:text-white text-indigo-600 font-bold">
                                    {{ $d['interviewees']['name'] . ' ' . $d['interviewees']['surname'] }}
                                </p>
                                <p class="text-xs dark:text-white text-indigo-600 ">
                                    {{ $d['interviewees']['interviewee_type']['name'] }}
                                </p>
                            </div>

                            <div class="flex items-center mt-5">
                               
                                <!-- <p class="bg-blue-100 text-blue-800 text-sm font-semibold inline-flex items-center p-1.5 rounded dark:bg-blue-200 dark:text-blue-800">

                                <p class="ml-1"></p>



                                </p> -->
                                


                            </div>
                        </div>

                        <div class="sm:grid-cols-2 mt-2">
                            <label class="dark:text-white text-indigo-600">Questioners:</label>
                            @if (count($quest) > 1)
                            @for ($i = 0; $i < count($quest) - 1; $i++) <div class="m-1 inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                                <span data-popover-target="popover-default" class="font-medium text-gray-600 dark:text-white">{{ substr($quest[$i], 0, 1) }}</span>
                        </div>{{ $quest[$i] }}
                        @endfor
                        @else
                        <div class="m-1 inline-flex overflow-hidden relative justify-center items-center w-10 h-10 bg-gray-100 rounded-full dark:bg-gray-600">
                            <span data-popover-target="popover-default" class="font-medium text-gray-600 dark:text-white">{{ substr($quest[0], 0, 1) }}</span>
                    </div>{{ $quest[0] }}
                    @endif
                </div>

            </div>


            <div class="flex items-center w-full mb-8">
                <label class="dark:text-white text-indigo-600 mr-3">Date:</label>
                <p class="text-base text-gray-400 font-normal"> {{ $d['interview_date'] }}</p>
            </div>

            <div class="flex items-center w-full mb-3">
                @if(count($exec) > 1)
                @foreach ($exec as $rat => $dd)
                    @if ($dd->candidate_id === $d['interviewees']['id'])
                <p class="bg-blue-100 text-blue-800 text-sm font-semibold inline-flex items-center p-1 rounded dark:bg-blue-200 dark:text-blue-800">{{ floatval($dd->rating) }}</p>
                <p class="ml-2 font-medium text-gray-900 dark:text-white">Rating</p>
                <span class="mx-2 w-1 h-1 bg-gray-900 rounded-full dark:bg-gray-500"></span>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">376 reviews</p>
                        @break
                    @endif
                @endforeach
                    @if (!($dd->candidate_id === $d['interviewees']['id']))
                <p class="bg-blue-100 text-blue-800 text-sm font-semibold inline-flex items-center p-1 rounded dark:bg-blue-200 dark:text-blue-800"></p>
                <p class="ml-2 font-medium text-gray-900 dark:text-white">Not Yet Rated</p>
                <span class="mx-2 w-1 h-1 bg-gray-900 rounded-full dark:bg-gray-500"></span>
                <p class="text-sm font-medium text-gray-500 dark:text-gray-400">0 reviews</p>
                    @endif
                    @endif 
            </div>

            <div class="grid grid-cols-1 grid-rows-3 gap-x-8 gap-y-2 w-full ">
                @foreach ($d['interviewees']['interviewee_type']['interviewee_attributes'] as $attribute)
                <dl>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">
                        {{ $attribute['name'] }}
                    </dt>
                    <dd class="flex items-center mb-3">

                    @php

                        $total = 0;
                        $index = 0;
                        $rate = 'No Rating';

                        foreach($review_attributes as $review_attribute){

                            if( $review_attribute->candidate_id == $d['interviewees']['id'] && $review_attribute->attribute_id == $attribute['id'] && $review_attribute->interview_id == $d['id']){

                                $total += $review_attribute->rating_amount;
                                $index++;
                            }
                        }

                        if($index != 0){

                            $rate = $total/$index;
                        }
                    @endphp

                        <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                            <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: {{($rate == 'No Rating' ? 0 : $rate) * 10 }}%"></div>
                        </div>
                        <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ round(floatval($rate), 1) }}</span>

                    </dd>
                </dl>
                @endforeach
            </div>

            <div class="mt-5">
                <a href="/storage/cv_path/{{ $cv[2] }}" download>
                    <button class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <svg class="fill-current w-4 h-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z" />
                        </svg>
                        <span> Download CV</span>
                    </button>
                </a>

            </div>


    </div>

    <div id="defaultModal{{ $d['id'] }}" tabindex="-1" class="hidden  overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full justify-center items-center flex" aria-modal="true" role="dialog">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">

            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">

                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        CV
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal{{ $d['id'] }}">
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

    <div id="editModal{{ $d['id'] }}" tabindex="-1" class="hidden  fixed top-0 right-0 left-0 z-50 md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-md h-full md:h-auto">

            <div class="overflow-y-auto h-[700px] relative bg-white rounded-lg dark:bg-gray-700 ">

                @foreach ($comment as $c)
                @php
                $link = explode('/', $c->questionnaires->img);

                @endphp

                @if ($c->candidate_id===$d['interviewees']['id'] && $c->interview_id===$d['id'])
                <div class="m-4 relative grid grid-cols-1 gap-4 p-4 mb-8  rounded-lg shadow-lg">
                    <div class="relative flex gap-4">

                        <div class="flex justify-center ">
                            <div class="text-black dark:text-gray-200 antialiased flex max-w-lg">

                                @if ($c->questionnaires->img === 'public/noProfilePhoto/nofoto.jpg')

                                <img class="rounded-full h-8 w-8 mr-2 mt-1" alt="" src="{{asset('/noProfilePhoto/'.$link[2])}}">

                                @else
                                <img class="rounded-full h-8 w-8 mr-2 mt-1" alt="" src="/storage/img/{{$link[2]}}">
                                @endif
                                <div>
                                    <div class="bg-gray-100 dark:bg-gray-700 rounded-3xl px-12 pt-2 pb-2.5">
                                        <div class="font-semibold text-sm leading-relaxed ml-[-30px]">{{$c->questionnaires->name}}
                                        </div>
                                        <div class="text-normal leading-snug md:leading-normal ml-[-30px]">
                                            {{$c->message}}
                                        </div>
                                    </div>
                                    <div class="text-sm ml-[20px] mt-0.5 text-gray-500 dark:text-gray-400">
                                        {{$c->created_at}}
                                    </div>

                                </div>
                            </div>
                        </div>
                        @if ($c->questionnaires->id===Auth::user()->id)
                        <a href="{{route('interview.Commentdestroy',$c->id)}}">Delete</a>
                        @endif
                    </div>
                </div>
                @endif
                @endforeach

                <div class="flex mx-auto items-center justify-center mx-8 mb-4 max-w-lg">

                    <form method="POST" id="comment" action={{ route('comment.store') }} class="dark:bg-gray w-full max-w-xl rounded-lg px-4 pt-2">
                        @csrf
                        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editModal{{ $d['id'] }}">
                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>

                        @if (in_array(Auth::user()->id, $questID))
                        <div class="mb-4 w-full bg-gray-50 rounded-lg border border-gray-200 dark:bg-gray-700 dark:border-gray-600">
                            <div class="py-2 px-4 bg-white rounded-t-lg dark:bg-gray-800">
                                <label for="comment" class="sr-only">Your comment</label>

                                <textarea name="message" id="comment" rows="4" class="px-0 w-full text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-white dark:placeholder-gray-400" placeholder="Write a comment..." required></textarea>

                                <input type="hidden" name="candidate_id" value={{ $d['interviewees_id'] }}>
                                <input type="hidden" name="interview_id" value={{ $d['id'] }}>


                            </div>
                            <div class="flex justify-between items-center py-2 px-3 border-t dark:border-gray-600">
                                <button type="submit" id="comment" class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                                    Post comment
                                </button>

                            </div>
                        </div>
                        @endif
                    </form>

                </div>

            </div>
        </div>
    </div>

    <div id="rateModal{{$d['id']}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Attribute Rating
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="rateModal{{$d['id']}}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <form id="rate" action="{{ route('review_attributes.store') }}" method="POST">
                     @csrf 
            
                        <input type="hidden" name="candidate_id" id="candidate_id" value="{{ $d['interviewees']['id'] }}" class="bg-gray-600 text-white rounded-lg"> <!-- Candidate ID -->
                        <input type="hidden" name="questionnaire_id" id="questionnaire_id" value="{{ Auth::user()->id }}" class="bg-gray-600 text-white rounded-lg"> <!-- Questionnaire ID -->
                        <input type="hidden" name="interview_id" id="interview_id" value="{{ $d['id'] }}" class="bg-gray-600 text-white rounded-lg"> <!-- Interview ID -->
                        
                 @foreach ($d['interviewees']['interviewee_type']['interviewee_attributes'] as $attribute)
                <dl>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 capitalize">
                    <input type="hidden" name="attribute_id[]" id="attribute_id" value="{{$attribute['id']}}" class="bg-gray-600 text-white rounded-lg" style="width: 5%"> <!-- Interview ID -->
                        
                    {{ $attribute['name'] }}

                    </dt>
                    <input type="range" name="rating_amount[]" id="rating_amount"  value="1" min="1" max="10" class="range" step="1" />
                    <dd class="flex items-center mb-3">

                        <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">

                        <div class="w-full flex justify-between text-xs px-2">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>4</span>
                            <span>5</span>
                            <span>6</span>
                            <span>7</span>
                            <span>8</span>
                            <span>9</span>
                            <span>10</span>
                        </div>
                        </div>
                    </dd>
                </dl>
                @endforeach
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button id="rate" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
            </div>
            
            </form>
        </div>
    </div>
</div>

<!-- ------------------------------------------------------------------------- -->
    <div id="editRateModal{{$d['id']}}" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Attribute Rating
                </h3>
                <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="editRateModal{{$d['id']}}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->

            @php

                $index = 0;
                $review_attribute_id;

                foreach($review_attributes as $r){
                    if($r->interview_id === $d['id'] && $r->questionnaire_id === Auth::user()->id){

                        $review_attribute_id[$index++] = $r->id;
                    }
                }
            @endphp


            <div class="p-6 space-y-6">
                <form id="rate" action="{{ route('review_attributes.update', $review_attribute_id ?? '') }}" method="POST">
                     @csrf 
            
                        <input type="hidden" name="candidate_id" id="candidate_id" value="{{ $d['interviewees']['id'] }}" class="bg-gray-600 text-white rounded-lg"> <!-- Candidate ID -->
                        <input type="hidden" name="questionnaire_id" id="questionnaire_id" value="{{ Auth::user()->id }}" class="bg-gray-600 text-white rounded-lg"> <!-- Questionnaire ID -->
                        <input type="hidden" name="interview_id" id="interview_id" value="{{ $d['id'] }}" class="bg-gray-600 text-white rounded-lg"> <!-- Interview ID -->
                    @foreach ($d['interviewees']['interviewee_type']['interviewee_attributes'] as $attribute)
                <dl>
                    <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 capitalize">
                    <input type="hidden" name="attribute_id[]" id="attribute_id" value="{{$attribute['id']}}" class="bg-gray-600 text-white rounded-lg" style="width: 5%"> <!-- Interview ID -->
                        
                    {{ $attribute['name'] }}
                    
                    </dt>

                    @foreach($review_attributes as $r)
                        @if($r->attribute_id === $attribute['id'] && $r->interview_id === $d['id'] && $r->questionnaire_id === Auth::user()->id)
                            <input type="range" name="rating_amount[]" id="rating_amount" value="{{ $r->rating_amount }}"  min="1" max="10" class="range" step="1" />
                        @endif
                    @endforeach
                    <dd class="flex items-center mb-3">

                        <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">

                        <div class="w-full flex justify-between text-xs px-2">
                            <span>1</span>
                            <span>2</span>
                            <span>3</span>
                            <span>4</span>
                            <span>5</span>
                            <span>6</span>
                            <span>7</span>
                            <span>8</span>
                            <span>9</span>
                            <span>10</span>
                        </div>
                        </div>
                    </dd>
                </dl>
                @endforeach
            </div>
            <!-- Modal footer -->
            <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <button id="rate" type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
            </div>
            
            </form>
        </div>
    </div>
</div>
    @endforeach
</div>
</div>


</section>

<div class="flex justify-center">
    <div>{{ $interview->links() }}</div>
    <div></div>
</div>


</div>
</div>
@endsection('content')