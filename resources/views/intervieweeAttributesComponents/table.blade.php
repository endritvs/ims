<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

  </head>



  <body>
<a href="{{route('intervieweeAttributes.create')}}">Create</a>
    <table style="border: 1px solid black">
  <tr>
    <th>id</th>
    <th>Name</th>
    <th>Interviewee Type</th>
  </tr>

  @foreach( $intervieweesA as $i ) <!-- Qet secilin prej userave ne tabele -->

  <tr>
   {{-- {{ dd($i->interviewee_type->name)}} --}}
    <td> {{ $i -> id }} </td> <!-- Qet ID te Userit -->
    <td> {{ $i -> name }} </td> <!-- Qet Emrin e Userit -->
    <td>{{$i->interviewee_type->name}}</td>
    {{-- <td>{{$i->interviewee_types.name}}</td> --}}
    
     <td> <a href="{{route('intervieweeAttributes.edit',$i->id)}}">Edit</a> </td> 
    <td> <a href="{{ route('intervieweeAttributes.destroy', $i -> id) }}">Delete</a> </td>  
  </tr>
  
  @endforeach
</table>
{{ $intervieweesA->links() }}

  </body>
</html>