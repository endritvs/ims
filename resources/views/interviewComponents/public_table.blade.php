@extends("layouts.layout")

@section('content')
<div class="mx-6 overflow-x-auto relative shadow-md sm:rounded-lg container mx-auto">
  <table class="w-full text-sm text-left  text-gray-400">
      <caption class="p-5 relative text-lg font-semibold text-left  bg-white text-white bg-gray-800">
          Your Interviewee Types
          <p class="mt-1 text-sm font-normal text-gray-400">Browse a list of Interviewee Types products designed to help you work, grow your business, and more. (Fix this text)</p>
     
      </caption>
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 bg-gray-700 text-gray-400">
          <tr>
              <th scope="col" class="py-3 px-6">
                Interview Name
              </th>
              <th scope="col" class="py-3 px-6">
                Interviewer
              </th>
              <th scope="col" class="py-3 px-6">
                Interviewee	  
            </th>
            <th scope="col" class="py-3 px-6">
              Date
          </th>
          <th scope="col" class="py-3 px-6">
            Interviewee Type
        </th>
        <th scope="col" class="py-3 px-6">
          Interviewee Attributes
      </th>
      <th scope="col" class="py-3 px-6">
      CV
    </th>

    
   
      </thead>  
      @foreach( $data as $i ) 
      
      <tr class="bg-white border-b bg-gray-800 border-gray-700">
        {{-- {{dd($data)}} --}}
        {{-- {{ $i -> interview_name }} --}}
      <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">{{ $i -> interview_id }}
       </th> 
      <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
         @foreach ($interview as $a)
         
        @if( $a -> interview_id === $i -> interview_id)
           {{ $a -> user -> name }} |
          @endif
            
          @endforeach
        </th>
      <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
        @foreach ($interview as $a)
        @if( $a -> interview_id === $i -> interview_id)
        {{ $a -> interviewees -> name }}
        @break
        @endif
        @endforeach
      </th>
      <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white"> {{ $i -> interview_date }} </th>
      <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
        @foreach ($interview as $a)
        @if( $a -> interview_id === $i -> interview_id)
        {{ $a -> interviewees ->  interviewee_type->name}}
        @break
        @endif
        @endforeach
      </th>

    <th scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
       @foreach ($interview as $s)
      
      @foreach ($s->interviewees->interviewee_type->interviewee_attributes as $attribute)
   
      {{$attribute->name.","}}
    
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
    </tr>
      @endforeach
    </table>
    {{ $data->links() }}
</div>

@endsection('content')

