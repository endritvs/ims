<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

  </head>



  <body>
<a href="{{route('interview.create')}}">Create</a>
    <table style="border: 1px solid black">
  <tr>
    <th>id</th>
    <th>Interviewer</th>
    <th>Interviewee</th>
    <th>Date</th>

  </tr>

  @foreach( $interview as $i ) <!-- Qet secilin prej userave ne tabele -->

  <tr>
   {{-- {{ dd($i->interviewee_type->name)}} --}}
    <td> {{ $i -> id }} </td> <!-- Qet ID te Userit -->
    <td> {{ $i-> user -> name }} </td> <!-- Qet Emrin e Userit -->
    <td> {{ $i-> users -> name }} </td>
    <td> {{ $i -> interview_date }} </td>
    
    <td> <a href="{{ route('interview.edit',$i->id)}}">Edit</a> </td> 
    <td> <a href="{{ route('interview.destroy', $i -> id) }}">Delete</a> </td>  
  </tr>
  
  @endforeach
</table>
{{ $interview->links() }}

  </body>
</html>