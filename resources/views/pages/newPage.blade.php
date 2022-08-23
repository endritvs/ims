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
    <th scope="col" class="py-3 px-6">Interview Date</th>

            </tr>

   @foreach ($interview as $a) 
 <tr class="bg-white border-b bg-gray-800 border-gray-700">
  
    <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white"> {{ $a -> interview_id }} </th>
    <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
     
   
     {{ $a -> user -> name }}
   
         
      </th>
   <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
    
    
     {{ $a -> interviewees -> name }}
    
    
   </th>
   <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
 

    {{ $a->interviewees ->interviewee_type->name}}


  </th>
  <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
      @foreach ($a->interviewees->interviewee_type->interviewee_attributes as $s)
     {{ $s->name.","}}
     @endforeach
  </th>

    <td scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">{{$a->interview_date}}</td>
     
  </tr>
 @endforeach

</table>
{{$interview->links()}}
@else

@endif
@endsection('content')