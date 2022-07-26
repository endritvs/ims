<!DOCTYPE html>
<html lang="en">
  <head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>

  </head>



  <body>

    <table style="border: 1px solid black">
  <tr>
    <th>id</th>
    <th>Name</th>
  </tr>

  @foreach( $interviewees as $i ) <!-- Qet secilin prej userave ne tabele -->

  <tr>
    <td> {{ $i -> id }} </td> <!-- Qet ID te Userit -->
    <td> {{ $i -> Name }} </td> <!-- Qet Emrin e Userit -->
    
    <td> <a href="#"></a> </td> <!-- Delete Button Here -->
    <td> <a href="#"></a> </td> <!-- Edit Button Here -->
  </tr>
  
  @endforeach
</table>

  </body>
</html>