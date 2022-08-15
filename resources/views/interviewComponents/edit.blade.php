@extends("layouts.layout")

@section('content')
<form class="shadow rounded-md w-[500px]" method="POST" action="{{ route('interview.update',$interview -> id) }}">
    @csrf
    <div class="p-4">
        <input type="text"  class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="interview_name" value={{ $interview -> interview_name }}>
        </div>
    <div class="p-4">
        <select name="interviewer" class="@error('interviewer') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" id="interviewer">

            @foreach($admin as $a)
    
                @if($a -> id === $interview -> interviewer)
                    <option value="{{$a->id}}">{{$a -> name}}</option>
                @endif
    
            @endforeach
            
            @foreach($admin as $a)
    
                @if($a -> id !== $interview -> interviewer)
                    <option value="{{$a->id}}">{{$a -> name}}</option>
                @endif
    
            @endforeach
    
            </select>
            @error('Interview')
            <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
    </div>
    <div class="p-4">
        <select name="interviewee" class="@error('interviewee') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md " id="interviewee">


            @foreach($default_user as $a)
     
                 @if($a -> id === $interview -> interviewee)
                     <option value="{{$a->id}}">{{$a -> name}}</option>
                 @endif
     
             @endforeach
             
             @foreach($default_user as $a)
     
                 @if($a -> id !== $interview -> interviewee)
                     <option value="{{$a->id}}">{{$a -> name}}</option>
                 @endif
     
             @endforeach
            
             
             </select>
             @error('Interview')
             <div class="alert alert-danger error-login">{{ $message }}</div>
         @enderror
    </div>
    <div class="p-4">
    <input type="date" min=<?php echo date('Y-m-d'); ?> class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" name="interview_date" value={{ $interview -> interview_date }}>
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">

        <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button>
    </div>
</form>
  
      
      @endsection('content')