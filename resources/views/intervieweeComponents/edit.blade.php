<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Interviewee</title>
</head>
<body>
    <form method="POST" action="{{ route('interviewee.update',$interviewee->id) }}">
        @csrf
        <label for="fname">Name:</label><br>
        <input type="text" id="name" name="name" value="{{$interviewee->name}}"><br>

        <button type="submit" class="btn btn-primary mt-2">Edit</button>
      </form> 
      
    
</body>
</html>