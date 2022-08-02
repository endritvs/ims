<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Interviewee</title>
</head>
<body>

    

    <form method="POST" action="{{ route('interviewees.update',$interviewees->id) }}" enctype="multipart/form-data">
        @csrf
        <label for="fname">Name:</label><br>
        <input type="text" id="name" name="name" value="{{$interviewees->name}}"><br>
        <label for="fname">Surname:</label><br>
        <input type="text" id="surname" name="surname" value="{{$interviewees->surname}}"><br>
        <label for="fname">CV:</label><br>
        <input type="file" id="cv_path" name="cv_path" value=""><br>
        <a href="" download></a>
        <label for="fname">CV File Path (Dont edit)</label><br>
        <input type="text" id="external_cv_path" name="external_cv_path" value="{{$interviewees->external_cv_path}}"><br> 
        <label for="fname">Profile image:</label><br>
        <input type="file" id="img" name="img" value="{{$interviewees->img}}"><br>
        
        <label for="interviewee_types_id">Interviewee Type:</label><br>
        <select name="interviewee_types_id" id="interviewee_types_id">
            @foreach ($intervieweesT as $i)   
                 @if($i->id===$interviewees->interviewee_types_id)
            <option value="{{$interviewees->id}}">{{$i->name}}</option>
             @break
                 @endif
           @endforeach
        @foreach ($intervieweesT as $i) 
            <option value="{{$i->id}}">{{$i->name}}</option>
        @endforeach
        
        </select><br>
        <button type="submit" class="btn btn-primary mt-2">Edit</button>
        <!-- </select> -->
        <!-- <button type="submit" class="btn btn-primary mt-2">Edit</button> -->
      </form> 
      
    
</body>
</html>