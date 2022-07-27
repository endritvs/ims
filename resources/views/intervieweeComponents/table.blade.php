<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

  </head>



  <body>
<a href="{{route('interviewee.create')}}">Create</a>
    <table style="border: 1px solid black">
  <tr>
    <th>id</th>
    <th>Name</th>
  </tr>

  @foreach( $interviewees as $i ) <!-- Qet secilin prej userave ne tabele -->

  <tr>
    <td> {{ $i -> id }} </td> <!-- Qet ID te Userit -->
    <td> {{ $i -> name }} </td> <!-- Qet Emrin e Userit -->
    
    <td> <a href="{{route('interviewee.edit',$i->id)}}">Edit</a> </td> <!-- Edit Button Here -->
    <td> <a href="{{ route('interviewee.destroy', $i -> id) }}">Delete</a> </td> <!-- Delete Button Here -->
  </tr>
  
  @endforeach
</table>
{{ $interviewees->links() }}

  </body>
</html>