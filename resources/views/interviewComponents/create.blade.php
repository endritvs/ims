<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create Interview</title>
</head>
<body>

    <form method="POST" action="{{ route('interview.store') }}">
        @csrf
        
        <label for="interviewee_types_id">Choose the interviewer:</label>
       
        <select name="interviewer"  class="@error('interviewer') is-invalid @enderror " id="interviewer">
            @foreach ($admin as $a)   
            <option value="{{$a->id}}">{{$a->name}}</option>
           @endforeach
        </select>
        @error('interviewer')
        <div class="alert alert-danger error-login">{{ $message }}</div>
    @enderror
        <br>

        <label for="interviewee">Choose the interviewee:</label>

    <select name="interviewee"  class="@error('interviewee') is-invalid @enderror " id="interviewee">
            @foreach ($default_user as $a)   
            <option value="{{$a->id}}">{{$a->name}}</option>
           @endforeach
        </select>
        @error('interviewee')
        <div class="alert alert-danger error-login">{{ $message }}</div>
    @enderror
        <br>

        <label for="interviewee_types_id">Choose date:</label>
        <input type="date" name="interview_date" min=<?php echo date('Y-m-d'); ?> id="dateId" class="@error('interview_date') is-invalid @enderror " >

        @error('interview_date')
        <div class="alert alert-danger error-login">{{ $message }}</div>
         @enderror
        
        <br>

        <button type="submit">Create</button>


      </form> 

</body>
</html>