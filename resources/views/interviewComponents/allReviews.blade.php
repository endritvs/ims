@extends('layouts.layout')

@section('content')
<title>Interview</title>



<div class="h-full ml-14 mt-8 mb-10 md:ml-64">
    <div class="w-full bg-white dark:bg-gray-800">
        <section class=" flex flex-row max-w-6xl mx-auto pb-4 px-4 sm:px-6 lg:px-4 py-12">
          
                
           
        <div class="w-full py-10">
            <div class="container mx-auto px-6 flex items-start justify-center">
                <div aria-label="group of cards" class="w-full">
                  
                    <div class="flex flex-col lg:flex-row mx-auto bg-white dark:bg-gray-800 shadow rounded">
                        @foreach ($review as $r)
                        @php
    $link = explode('/', $r->candidates->img);
@endphp
                        <div class="w-full lg:w-1/3 px-12 flex flex-col items-center py-10 border border-gray-300">
                         
                            <div class="w-24 h-24 mb-3 p-2 rounded-full bg-gray-200 dark:bg-gray-700 flex items-center justify-center">
                                @if ($r->candidates->img!=="public/noProfilePhoto/nofoto.jpg")
                                <img class="w-full h-full overflow-hidden object-cover rounded-full" src="{{asset('/storage/images/'.$link[2])}}"/>
                                @else
                                <img class="w-full h-full overflow-hidden object-cover rounded-full" src="{{asset('/noProfilePhoto/'.$link[2])}}"/>
                                @endif
                            </div>
                            <a tabindex="0" class="focus:outline-none focus:opacity-75 hover:opacity-75 text-gray-800 dark:text-gray-100 cursor-pointer focus:underline"><h2 class=" text-xl tracking-normal font-medium mb-1">{{$r->candidates->name. " ".$r->candidates->surname}}</h2></a>
                            <a tabindex="0" class="cursor-pointer hover:text-indigo-700 focus:underline focus:outline-none focus:text-indigo-700 flex text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-3 text-center">
                                <span class="cursor-pointer mr-1 text-gray-600 dark:text-gray-100">
                                    <img src="https://tuk-cdn.s3.amazonaws.com/can-uploader/full_width_3_section_card-svg1.svg" alt="icon"/>
                                    
                                </span>
                                {{$r->candidates->interviewee_type->name}}
                            </a>
                            <p class="text-gray-600 dark:text-gray-100 text-sm tracking-normal font-normal mb-8 text-center w-10/12">The more I deal with the work as something that is my own, as something that is personal, the more successful it is.</p>
                         
                            <div class="flex items-start">
                                @foreach($r->candidates->interviewee_type->interviewee_attributes as $attr)
                                <a tabindex="0" class="cursor-pointer hover:opacity-75  bg-gray-200 text-gray-600 dark:text-gray-100 dark:bg-gray-700 rounded text-xs leading-3 py-2 px-3 ml-1">{{$attr->name}}</a>
                               
                                @endforeach
                            </div>
                        </div>
                        @break
                        @endforeach 
                        <div class="w-full lg:w-1/3 px-12 border-t border-b lg:border-t-0 lg:border-b-0 lg:border-l lg:border-r border-gray-300  py-10 flex-col flex">
                             <h1 class="font-bold ">Overall Rating</h1> 
                              <div class="grid grid-cols-3 gap-3"> 
                             
                                @foreach ($review as $rr)
                                 <div>
                                     <h1>{{$rr->questionnaires->name}}</h1>
                                     <dl>
                                         <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">Overall Knowledge</dt>
                                         <dd class="flex items-center mb-3">
                                             <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                                 <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width:calc(100-{{$rr->rating_amount}}%)"></div>
                                             </div>
                                             <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$rr->rating_amount}}</span>
                                         </dd>
                                     </dl>
                                 </div>
                                 @endforeach
                             </div> 
                         </div>
                     
                        <div class="w-full lg:w-1/3 px-12 border-t border-b lg:border-t-0 lg:border-b-0 lg:border-l lg:border-r border-gray-300  py-10 flex-col flex">
                            <h1 class="font-bold ">Attributes</h1> 
                            <div class="grid grid-cols-3 gap-3"> 
                             @foreach($review_attributes as $rw)
                       
                                <div>
                                    <h1>{{$rw->questionnaires->name}}</h1>
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$rw->attributes->name}}</dt>
                                        <dd class="flex items-center mb-3">
                                            <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                                <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: {{$rw->rating_amount*10}}%"></div>
                                            </div>
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$rw->rating_amount}}</span>
                                        </dd>
                                    </dl>
                                </div>
                                  @endforeach
                            </div> 
                        </div>
                        
                        <div class="w-full lg:w-1/3 flex-col flex lg:justify-center md:justify-start items-center px-12 border border-gray-300">
                            <h1 class="font-bold ">Comments</h1> 
    <div class="grid grid-cols-3 gap-3">
      
         @foreach ($comment as $c)
@php
    $link = explode('/', $c->questionnaires->img);
@endphp
    <div class="bg-white dark:bg-gray-800 text-black dark:text-gray-200 p-4 antialiased flex max-w-lg">
        @if ($c->questionnaires->img!=="public/noProfilePhoto/nofoto.jpg")
      <img class="rounded-full h-8 w-8 mr-2 mt-1 " src="{{asset('/storage/images/'.$link[2])}}"/>
      @else
      <img class="rounded-full h-8 w-8 mr-2 mt-1 " src="{{asset('/noProfilePhoto/'.$link[2])}}"/>
      @endif
      
      <div>
        <div class="bg-gray-100 dark:bg-gray-700 rounded-3xl px-4 pt-2 pb-2.5">
          <div class="font-semibold text-sm leading-relaxed">{{$c->questionnaires->name}}</div>
          <div class="text-normal leading-snug md:leading-normal"
          >{{$c->message}}</div>
        </div>
        <div class="text-sm ml-4 mt-0.5 text-gray-500 dark:text-gray-400">{{$c->created_at}}</div>
      
      </div>
    </div>  @endforeach
    </div>   

                        </div>
                    </div>
          
                </div>
            </div>
        </div>
    
        </section>
    </div>
</div>

@endsection('content')

{{-- {{dd($groupedComment)}} --}}


{{-- @extends("layouts.layout")

@section('content')

<div class="h-full ml-14 mt-10 mb-10 md:ml-64">
    <div class="w-full">
      <section class="px-4 flex flex-row sm:px-6 lg:px-4 py-12">

        <div class="relative max-w-md mx-auto md:max-w-2xl mt-6 min-w-0 break-words bg-white dark:bg-gray-900 w-[30%] mb-6 shadow-lg rounded-xl mt-16">
            <div class="px-6">
                @foreach ($review as $r)
                @php
                $link = explode('/', $r->questionnaires->img);
            @endphp
                <div class="flex flex-wrap justify-center">
                    <div class="w-full flex justify-center">
                        <div class="relative">
                            @if ($r->questionnaires->img!=="public/noProfilePhoto/nofoto.jpg")
                            <img class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" src="{{asset('/storage/images/'.$link[2])}}"/>
                            @else
                            <img class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]" src="{{asset('/noProfilePhoto/'.$link[2])}}"/>
                            @endif    
                        </div>
                    </div>
                    <div class="w-full text-center mt-20">
                        <div class="flex justify-center lg:pt-4 pt-8 pb-0">
                            <div class="p-3 text-center">
                                <span class="text-xl font-bold block pb-2 uppercase tracking-wide text-gray-700 dark:text-white">{{$r->questionnaires->name}}</span>
                                <div class="flex justify-center">
                                   @for ($i=0; $i <$r->rating_amount; $i++)    
                                    <svg aria-hidden="true" class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
                                    @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                   @endforeach
             
                <div class="text-center space-y-2 mt-2">
                    <h3 class="text-2xl text-gray-700 dark:text-white font-bold leading-normal mb-1">Attributes:</h3>
                    <p class="text-left text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">HTML</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                    <p class="text-left text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">javascript</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                    <p class="text-left text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">React JS</p>
                    <div class="w-full bg-gray-200 rounded-full h-2.5 dark:bg-gray-700">
                        <div class="bg-blue-600 h-2.5 rounded-full" style="width: 45%"></div>
                    </div>
                </div>
                <div class="mt-6 py-6 border-t border-slate-200 text-center">
        
                    <div class="flex justify-center relative top-1/3">
         
                        <div class="relative grid grid-cols-1 gap-4 p-4 mb-8 border rounded-lg bg-white dark:bg-gray-700 shadow-lg">
                            <div class="relative flex gap-4">
                                <img src="/img/me-about.jpg" class="relative object-cover rounded-lg -top-8 -mb-4 bg-white border h-20 w-20" alt="" loading="lazy">
                                <div class="flex flex-col w-full">
                                    <div class="flex flex-row justify-between">
                                        <p class="relative text-xl whitespace-nowrap truncate overflow-hidden">COMMENTOR</p>
                                    </div>
                                    <p class="text-gray-400 dark:text-white text-sm">20 April 2022, at 14:88 PM</p>
                                </div>
                            </div>
                            <p class="-mt-4 text-gray-500 dark:text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>Maxime quisquam vero adipisci beatae voluptas dolor ame.</p>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center space-x-4">
                    <img class="w-20 h-20 object-cover mb-7 rounded" src="/img/huh.png" alt="Large avatar">
                    <div class="font-medium text-black dark:text-white">
                        <p>Jese Leos</p>
                        <div class="text-sm text-gray-500 dark:text-gray-400">Questioner: name</div>
                    </div>
                </div>
            </div>
        </div>
    
 
      </section>
    </div>
</div>
@endsection('content') --}}