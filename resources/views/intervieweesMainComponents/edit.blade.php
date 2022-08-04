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
        <input type="text" class="@error('name') is-invalid @enderror" id="name" name="name" value="{{$interviewees->name}}"><br>
        @error('name')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror


        <label for="fname">Surname:</label><br>
        <input type="text"  class="@error('surname') is-invalid @enderror" id="surname" name="surname" value="{{$interviewees->surname}}"><br>
        @error('surname')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror


        <label for="fname">CV:</label><br>
        <input type="file" class="@error('cv_path') is-invalid @enderror" id="cv_path" name="cv_path" value=""><br>
        <a href="" download></a>
        @error('cv_path')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror


        <label for="fname">CV File Path (Dont edit)</label><br>
        <input type="text" class="@error('external_cv_path') is-invalid @enderror" id="external_cv_path" name="external_cv_path" value="{{$interviewees->external_cv_path}}"><br> 
        @error('external_cv_path')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
        

        <label for="fname">Profile image:</label><br>
        <input type="file" class="@error('img') is-invalid @enderror" id="img" name="img" value="{{$interviewees->img}}"><br>
        @error('img')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
        
        
        <label for="interviewee_types_id">Interviewee Type:</label><br>
        <select class="@error('interviewee_types_id') is-invalid @enderror" name="interviewee_types_id" id="interviewee_types_id">
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
        @error('interviewee_types_id')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
        <button type="submit" class="btn btn-primary mt-2">Edit</button>
        <!-- </select> -->
        <!-- <button type="submit" class="btn btn-primary mt-2">Edit</button> -->
      </form> 
      
    
</body>
</html>