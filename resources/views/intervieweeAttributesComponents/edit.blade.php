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
        <input type="text" id="name" name="name" value="{{$interviewee->name}}"><br>
        <select name="interviewee_types_id" id="interviewee_types_id">
            @foreach ($intervieweesT as $i)   
                 @if($i->id===$interviewee->interviewee_types_id)
            <option value="{{$interviewee->id}}">{{$i->name}}</option>
             @break
                 @endif
           @endforeach
        @foreach ($intervieweesT as $i) 
            <option value="{{$i->id}}">{{$i->name}}</option>
        @endforeach
        
        </select>
        <button type="submit" class="btn btn-primary mt-2">Edit</button>
      </form> 
      
    
</body>
</html>