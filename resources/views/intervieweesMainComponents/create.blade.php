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
<input type="text" name="name" class="@error('name') is-invalid @enderror" id="name" placeholder="Emri"><br>
@error('name')
<div class="alert alert-danger error-login">{{ $message }}</div>
@enderror
<input type="text" class="@error('surname') is-invalid @enderror" name="surname" id="surname" placeholder="mbiemri"><br>
@error('surname')
<div class="alert alert-danger error-login">{{ $message }}</div>
@enderror
<input type="file" class="@error('cv_path') is-invalid @enderror" name="cv_path" id="cv_path" placeholder="cv_path" ><br>
@error('cv_path')
<div class="alert alert-danger error-login">{{ $message }}</div>
@enderror
<input type="text" class="@error('cv_path') is-invalid @enderror"  name="external_cv_path" id="external_cv_path" placeholder="external_cv_path"><br>
@error('external_cv_path')
<div class="alert alert-danger error-login">{{ $message }}</div>
@enderror


<select class="@error('interviewee_types_id') is-invalid @enderror" name="interviewee_types_id" id="interviewee_types_id">
            @foreach ($intervieweesT as $i)   
            <option value="{{$i->id}}">{{$i->name}}</option>
           @endforeach
        </select><br>
        @error('interviewee_types_id')
<div class="alert alert-danger error-login">{{ $message }}</div>
@enderror


<select class="@error('interviewee_attributes_id') is-invalid @enderror" name="interviewee_attributes_id" id="interviewee_attributes_id">
    @foreach ($intervieweesA as $i)   
    <option value="{{$i->id}}">{{$i->name}}</option>
   @endforeach
</select><br>
@error('interviewee_attributes_id')
<div class="alert alert-danger error-login">{{ $message }}</div>
@enderror

<input type="file" class="@error('img') is-invalid @enderror" name="img" id="img" placeholder="img" ><br>
        @error('img')
        <div class="alert alert-danger error-login">{{ $message }}</div>
        @enderror
<button type="submit">Create</button>
</form>

</body>
</html>