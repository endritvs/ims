<<<<<<< Updated upstream
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Interviewee</title>
</head>

<body>
    <form method="POST" action="{{ route('intervieweeAttributes.update',$interviewee->id) }}">
        @csrf
        <label for="fname">Name:</label><br>
        <input type="text" id="name" class="@error('interviewee_types_id') is-invalid @enderror " name="name" value="{{$interviewee->name}}"><br>
        @error('name')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
        <select name="interviewee_types_id" class="@error('interviewee_types_id') is-invalid @enderror " id="interviewee_types_id">
            @foreach ($intervieweesT as $i)
            @if($i->id===$interviewee->interviewee_types_id)
            <option value="{{$i->id}}">{{$i->name}}</option>
            @break
            @endif
            @endforeach
            @foreach ($intervieweesT as $i)
            @if($i->id!==$interviewee->interviewee_types_id)
            <option value="{{$i->id}}">{{$i->name}}</option>

            @endif

            @endforeach

        </select>
        @error('interviewee_types_id')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-2">Edit</button>
    </form>


</body>

</html>
=======

      

      @extends("layouts.layout")

@section('content')
    <form class="shadow rounded-md w-[500px]" method="POST" action="{{ route('intervieweeAttributes.update',$interviewee->id) }}">
        @csrf
        <div class="p-4">
            <label for="first-name" class="block mb-2 text-sm font-medium text-gray-700">Interviewee Type:</label>
            <input type="text" value="{{$interviewee->name}}" name="name" id="name" autocomplete="given-name" placeholder="Interviewee Type Name" class="@error('interviewee_types_id') is-invalid @enderror mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
            @error('name')
            <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
        </div>
        <div class="p-4">
            <select name="interviewee_types_id" class="@error('interviewee_types_id') is-invalid @enderror " id="interviewee_types_id">
                @foreach ($intervieweesT as $i)   
                     @if($i->id===$interviewee->interviewee_types_id)
                <option value="{{$i->id}}">{{$i->name}}</option>
                 @break
                     @endif
               @endforeach
            @foreach ($intervieweesT as $i) 
            @if($i->id!==$interviewee->interviewee_types_id)
            <option value="{{$i->id}}">{{$i->name}}</option>
    
                 @endif
        
            @endforeach
            
            </select>
            @error('interviewee_types_id')
            <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Edit</button>
        </div>
    </form>
@endsection

    
>>>>>>> Stashed changes
