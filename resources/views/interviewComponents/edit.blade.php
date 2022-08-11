<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Interviewee</title>
</head>
<body>
    <form method="POST" action="{{ route('interview.update',$interview -> id) }}">
        @csrf
         
        <select name="interviewer" class="@error('interviewer') is-invalid @enderror " id="interviewer">

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
    <br>

    <select name="interviewee" class="@error('interviewee') is-invalid @enderror " id="interviewee">


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
    <br>

    <input type="date" min=<?php echo date('Y-m-d'); ?> name="interview_date" value={{ $interview -> interview_date }}>
    <br>

        <button type="submit" class="btn btn-primary mt-2">Edit</button>
      </form> 
      
    
</body>
</html>