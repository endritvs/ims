<!doctype html>
<html>
<head>
   @include('includes.head')
</head>
<body>
<div class="container">

   <header class="row">
       @include('includes.header')
   </header>

   <div id="main" class="row">
           @yield('content')
   </div>

   <footer class="row">
       @include('includes.footer')
   </footer>

   <div>
       @yield('content-1')
   </div>

   <div>
       @yield('content-2')
   </div>
   

</div>
</body>
</html>