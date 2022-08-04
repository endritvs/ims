<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Interviewee Attributes</title>
</head>
<body>
    <form method="POST" action="{{ route('intervieweeAttributes.store') }}">
        @csrf
        <label for="fname">Choose a attribute::</label><br>
        <input type="text" class="@error('name') is-invalid @enderror " id="name" name="name"><br>
        @error('name')
        <div class="alert alert-danger error-login">{{ $message }}</div>
    @enderror


        <label for="interviewee_types_id">Name:</label>
   
            
       
        <select name="interviewee_types_id"  class="@error('interviewee_types_id') is-invalid @enderror " id="interviewee_types_id">
            @foreach ($intervieweesT as $i)   
            <option value="{{$i->id}}">{{$i->name}}</option>
           @endforeach
        </select>
        @error('name')
        <div class="alert alert-danger error-login">{{ $message }}</div>
    @enderror
        <br>
        <button type="submit" >Create</button>
      </form> 
      
    
</body>
</html>