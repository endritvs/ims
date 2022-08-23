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
   

    
   
      </thead>  
  
      @foreach ($interview as $d)
        
   
      <tr class="bg-white border-b bg-gray-800 border-gray-700">
      <td scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
        {{$d['interview_id']}}
      </td>
      <td scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
        {{$d['user']['name']}}
      </td>
      <td scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
        {{$d['interviewees']['name']." ".$d['interviewees']['surname']}}
      </td>
      <td scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
        {{$d['interview_date']}}
      </td>
      <td scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
        {{$d['interviewees']['interviewee_type']['name']}}
      </td>
      <td scope="row" class="py-4 px-6 font-medium whitespace-nowrap text-white">
       
        @foreach ($d['interviewees']['interviewee_type']['interviewee_attributes'] as $attribute)
            {{$attribute['name']}}
        @endforeach
      </td>
    </tr>
   @endforeach
    </table>
    {{ $interview->links() }}
</div>

@endsection('content')

