
<!DOCTYPE html>
<html lang="EN">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign In & Sign Up Form</title>
        <link rel="stylesheet" href="/css/main.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css">
    </head>
    <style>
        .error-login{
            color:red;
            font-size:11px;
        }
        form{
            gap:0px!important;
        }
    </style>
    <body>
       <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form method="POST" action ="{{ route('register') }}">
                    @csrf
                    <h1>Create Account</h1>
                    
                    <span>or use your email for registration</span>
                    <input type="text" class="@error('name') is-invalid @enderror " name="name" placeholder="Name">
                    @error('name')
                        <div class="alert alert-danger error-login">{{ $message }}</div>
                    @enderror
                    <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email">
                    @error('email')
                        <div class="alert alert-danger error-login">{{ $message }}</div>
                    @enderror
                    <input type="password"  class="@error('password') is-invalid @enderror" name="password" placeholder="Password">
                    @error('password')
                    <div class="alert alert-danger error-login">{{ $message }}</div>
                @enderror
                    <input type="password"  class="@error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Confirm Password">
                    @error('password_confirmation')
                    <div class="alert alert-danger error-login">{{ $message }}</div>
                @enderror
                    <button>Sign Up</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <h1>Sign In</h1>
                    <span>or use your account</span>
                    <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email">
                    @error('email')
                    <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        {{ $message }}
                    </div>
                    <!-- <span class="alert alert-danger" role="alert">{{ $message}}</span> -->
                    @enderror
                    <input type="password" class="@error('password') is-invalid @enderror"  name="password" placeholder="Password">
                    @error('password')
                    <div class="alert">
                     <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
                        {{ $message }}
                    </div>
                    <!-- <div  class="alert error-login alert-danger">{{ $message }}</div> -->
                @enderror
                    <button>Sign In</button>
                </form>
            </div>
            <div class="overlay-container">
                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>
                            Please login to your account with your personal info.
                        </p>
                        <button class="ghost" id="signIn">Sign In</button>
                    </div>

                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>
                            Enter your personal details to create an account
                        </p>
                        <button class="ghost" id="signUp">Sign Up</button>
                    </div>
                </div>
            </div>
       </div>
       <script src="/js/loginscript.js"></script>
       <script>
            // Get all elements with class="closebtn"
            var close = document.getElementsByClassName("closebtn");
            var i;

            // Loop through all close buttons
            for (i = 0; i < close.length; i++) {
            // When someone clicks on a close button
            close[i].onclick = function(){

                // Get the parent of <span class="closebtn"> (<div class="alert">)
                var div = this.parentElement;

                // Set the opacity of div to 0 (transparent)
                div.style.opacity = "0";

                // Hide the div after 600ms (the same amount of milliseconds it takes to fade out)
                setTimeout(function(){ div.style.display = "none"; }, 600);
            }
            }
        </script>
    </body>
</html>