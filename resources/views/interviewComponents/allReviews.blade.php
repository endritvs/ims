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
                                @foreach($additional_reviews as $ar)
                                <a tabindex="0" class="cursor-pointer hover:opacity-75  bg-gray-200 text-gray-600 dark:text-gray-100 dark:bg-gray-700 rounded text-xs leading-3 py-2 px-3 ml-1">{{$ar->name}}</a>

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

                        @if(count($additional_reviews) > 0)
                        <div class="w-full lg:w-1/3 px-12 border-t border-b lg:border-t-0 lg:border-b-0 lg:border-l lg:border-r border-gray-300  py-10 flex-col flex">
                            <h1 class="font-bold ">Additional Attributes</h1> 
                            <div class="grid grid-cols-3 gap-3"> 

                                @foreach($additional_reviews as $ar)
                       
                                <div>
                                    <h1>{{$ar->questionnaires->name}}</h1>
                                    <dl>
                                        <dt class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$ar->name}}</dt>
                                        <dd class="flex items-center mb-3">
                                            <div class="w-full bg-gray-200 rounded h-2.5 dark:bg-gray-700 mr-2">
                                                <div class="bg-blue-600 h-2.5 rounded dark:bg-blue-500" style="width: {{$rw->rating_amount*10}}%"></div>
                                            </div>
                                            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{$ar->rating_amount}}</span>
                                        </dd>
                                    </dl>
                                </div>
                                  @endforeach
                            </div> 
                        </div>
                        @endif
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
          <div class="text-normal leading-snug md:leading-normal">
            {{$c->message}}
          </div>
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

@endsection