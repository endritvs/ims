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
        <input type="text" id="name" name="name"><br>

        <label for="interviewee_types_id">Name:</label>
   
            
       
        <select name="interviewee_types_id" id="interviewee_types_id">
            @foreach ($intervieweesT as $i)   
            <option value="{{$i->id}}">{{$i->name}}</option>
           @endforeach
        </select>
        <br>
        <button type="submit" >Create</button>
      </form> 
      
    
</body>
</html>