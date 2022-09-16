<!DOCTYPE html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@2.27.0/dist/full.css" rel="stylesheet" type="text/css" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/css/login-signup.css">
</head>

 
<style>
button{
  padding: 15px 30px;
  background: #000;
  border:0;
  color: #fff;
  text-transform: uppercase;
  font-family: helvetica;
  font-size: 12px;
  letter-spacing: 3px;
  position: relative;
  transition:         all .4s cubic-bezier(0.645, 0.045, 0.355, 1);
  cursor: pointer;
  display: block;

margin-bottom: auto;
}

button::after,
button::before{
  content: "";
  position: absolute;
  top: 50%;
  right: 0px;
  transform: translateY(-50%);
    opacity: 0;
  transition:         all .4s cubic-bezier(0.645, 0.045, 0.355, 1);
}

button::after{
    width: 30px;
    height: 1px;
    background: white;
    transform: translateX(-3px);
    margin-top: 0px;
}

button::before{
    content: "";
    transform: rotate(-135deg) translateX(50%);
    width: 11px;
    height: 11px;
    background: transparent;
    border-left: 1px solid white;
    border-bottom: 1px solid white;
  margin-top: -1px;
}


button:hover{
  padding: 15px 60px 15px 20px;
}

button:hover::after,
button:hover::before{
  opacity: 1;
  right: 15px;
}


body::-webkit-scrollbar{
            height: 10px;
                width: 10px;
            }
           body::-webkit-scrollbar-track{
                display: none;
                background:whitesmoke;
            }
            body::-webkit-scrollbar-thumb{

                border-radius: 20px;
                background-color:grey;
            }
</style>
<script>
    window.smoothScroll = function(target) {
    var scrollContainer = target;
    do { //find scroll container
        scrollContainer = scrollContainer.parentNode;
        if (!scrollContainer) return;
        scrollContainer.scrollTop += 1;
    } while (scrollContainer.scrollTop == 0);

    var targetY = 0;
    do { //find the top of target relatively to the container
        if (target == scrollContainer) break;
        targetY += target.offsetTop;
    } while (target = target.offsetParent);

    scroll = function(c, a, b, i) {
        i++; if (i > 30) return;
        c.scrollTop = a + (b - a) / 30 * i;
        setTimeout(function(){ scroll(c, a, b, i); }, 20);
    }
    // start scrolling
    scroll(scrollContainer, scrollContainer.scrollTop, targetY, 0);
}

</script>
<body>
    
    <div class="bg-gradient-to-r from-[#301e4b] to-[#0cbaba]">
        <img src="img/starlabslogo.png" class="w-[70px] h-[65px]  sticky top-4 pl-[10px]"  alt="">
    <div class="float-right sticky top-10">                   
                    <h1 class="text-white">Interviews were never easier than with our IMS</h1></br>
                    <button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">Sign In</button>

                    <img src="img/register.svg" class="h-screen w-[550px] sticky top-4 float-right" alt="">
                </div>
                <form action="{{route('typeform.typeform')}}" method="POST" enctype='multipart/form-data'>
                    @csrf
    <div class="grid w-[500px] bg-transparent place-content-center h-[850px] " id="first">
      <div class="pb-[100px] grid place-content-center"> 
        <p class="text-4xl">1.
            Hello, what's your name?</p>
            <br>
            <input type="text" class="@error('name') is-invalid @enderror block p-2 rounded w-[450px] h-[50px] border-none outline-none"  placeholder="Name" name="name" value=""><br>
            @error('name')
                        <div class="ml-1 text-xl text-red-500 text-xs alert alert-danger w-[400px] bg-transparent">{{ $message }}</div>
            @enderror
        <button type="button" onclick="smoothScroll(document.getElementById('second'))">OK!</button>
        </div>
    </div>
<div class="grid w-[500px] bg-transparent place-content-center h-[850px]" id="second" >
    <p class="text-4xl">2.
        Now we need your email:</p>
        <br>
        <input type="email" class="@error('email') is-invalid @enderror block p-2 rounded w-[450px] h-[50px] border-none outline-none" placeholder="name@example.com" name="email" value=""><br>
        @error('email')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger w-[400px] bg-transparent">{{ $message }}</div>
        @enderror
    <button type="button" onclick="smoothScroll(document.getElementById('third'))">OK!</button>
</div>
<div class="grid w-[500px] bg-transparent place-content-center h-[850px]" id="third">
    <p class="text-4xl">3.
        Password and confirm password</p>
        <br>
        <input type="password" class="@error('password') is-invalid @enderror block p-2 rounded w-[450px] h-[50px] border-none outline-none" placeholder="Password" name="password" value=""><br>
        @error('password')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger w-[400px] bg-transparent">{{ $message }}</div>
         @enderror
        <input type="password" class="@error('password_confirmation') is-invalid @enderror block p-2 rounded w-[450px] h-[50px] border-none outline-none" placeholder="Confirm Password" name="password_confirmation" value=""><br>
        @error('password_confirmation')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger w-[400px] bg-transparent">{{ $message }}</div>
         @enderror
    <button type="button" onclick="smoothScroll(document.getElementById('forth'))">OK!</button>
</div>
<div class="grid w-[500px] bg-transparent place-content-center h-[850px]" id="forth">
    <p class="text-4xl">4.
        Company Name</p>
         <br>
         <input type="text" class="@error('company_name') is-invalid @enderror block p-2 rounded w-[450px] h-[50px] border-none outline-none" placeholder="Company Name" name="company_name" value=""><br>
         @error('company_name')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger w-[400px] bg-transparent">{{ $message }}</div>
         @enderror
         
    <button type="button" onclick="smoothScroll(document.getElementById('fifth'))">OK!</button>
</div>
<div class="grid w-[500px]  bg-transparent place-content-center h-[850px]" id="fifth">
  
<p class="text-4xl">5.
        Candidate Types and Attributes</p>
        <br>
        <input type="text" class="@error('interview_type') is-invalid @enderror block p-2 rounded w-[450px] h-[50px] border-none outline-none" placeholder="Interview Type" name="interview_type" value=""><br>
        @error('interview_type')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger w-[400px] bg-transparent">{{ $message }}</div>
         @enderror
        <input type="text" class="@error('interview_attribute') is-invalid @enderror block p-2 rounded w-[450px] h-[50px] border-none outline-none" placeholder="Interview Attribute" name="interview_attribute" value=""><br>
        @error('interview_attribute')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger w-[400px] bg-transparent">{{ $message }}</div>
         @enderror

         <input class="@error('img') is-invalid @enderror block p-2 rounded w-[450px] h-[50px] border-none outline-none" style="line-height:3 !important;"  type="file" name="img" ><br>
                       
        @error('img')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger w-[400px] bg-transparent">{{ $message }}</div>
        @enderror

    <button type="submit">Submit</button>
</div>
</form>

</div>
</body>
