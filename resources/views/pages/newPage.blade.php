@extends("layouts.layout")

@section('content')
 @if(Auth::user()->role==="interviewer")
<div class="overflow-x-auto relative shadow-md sm:rounded-lg container mx-auto">
    <table class="w-full text-sm text-left  text-gray-400">
        <caption class="p-5 relative text-lg font-semibold text-left  bg-white text-white bg-gray-800">
          Your upcomming interviews
            <p class="mt-1 text-sm font-normal text-gray-400">Browse a list of Interviewee Types products designed to help you work, grow your business, and more. (Fix this text)</p>
         
      
        </caption>
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 bg-gray-700 text-gray-400">
            <tr>

    <th scope="col" class="py-3 px-6">Interview Name</th>
    <th scope="col" class="py-3 px-6">Interviewer</th>
    <th scope="col" class="py-3 px-6">Interviewee</th>
    <th scope="col" class="py-3 px-6">Interview Type</th>
    <th scope="col" class="py-3 px-6">Interview Attribute</th>
    <th scope="col" class="py-3 px-6">Download CV</th>
    <th scope="col" class="py-3 px-6">Interview Date</th>

            </tr>
  @foreach( $data as $i ) 
 <tr class="bg-white border-b bg-gray-800 border-gray-700">
    <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white"> {{ $i -> interview_id }} </th>
    <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
      @foreach ($interview as $a)
     @if( $a -> interview_id === $i -> interview_id)
     {{ $a -> user -> name }}
@endif
         
       @endforeach</th>
   <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
     @foreach ($interview as $a)
     @if( $a -> interview_id === $i -> interview_id)
     {{ $a -> interviewees -> name }}
     @break
     @endif
     @endforeach
   </th>
   <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
    @foreach ($interview as $a)
    @if( $a->interview_id === $i->interview_id)
    {{ $a->interviewees ->interviewee_type->name}}
    @break
    @endif
    @endforeach
  </th>
  <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
    @foreach ($interview as $i)
      {{-- {{dd($i)}} --}}
      @foreach ($i->interviewees->interviewee_type->interviewee_attributes as $a)
    
      {{-- {{dd($a->interviewees->interviewee_attributes->id)}} --}}
     {{-- @if( $a -> interview_id === $i -> interview_id) --}}
   
     {{ $a->name.","}}
     
     {{-- @break
     @endif --}}
     @endforeach
    @endforeach
   

  </th>
  <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
    @foreach ($interview as $a)
    @php

    $link = explode("/", $a -> interviewees->img);
    $cv = explode("/", $a ->interviewees-> cv_path);
  @endphp
    @if( $a -> interview_id === $i -> interview_id)
    <a class="underline" href="/storage/cv_path/{{$cv[2]}}" download>Download CV</a>

    @break
    @endif
    @endforeach
  </th>
 

    <td scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">{{$i->interview_date}}</td>
    
  </tr>
  @endforeach
</table>
@else

@endif
@endsection('content')