<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<form method="POST" action="{{ route('interviewees.store') }}" enctype="multipart/form-data">
    @csrf
<input type="text" name="name" id="name" placeholder="Emri"><br>
<input type="text" name="surname" id="surname" placeholder="mbiemri"><br>
<input type="file" name="cv_path" id="cv_path" placeholder="cv_path" ><br>
<input type="text" name="external_cv_path" id="external_cv_path" placeholder="external_cv_path"><br>
<select name="interviewee_types_id" id="interviewee_types_id">
            @foreach ($intervieweesT as $i)   
            <option value="{{$i->id}}">{{$i->name}}</option>
           @endforeach
        </select><br>
        <input type="file" name="img" id="img" placeholder="img" ><br>
<button type="submit">Create</button>
</form>

</body>
</html>