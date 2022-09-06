
<!DOCTYPE html>
<html lang="EN">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign In & Sign Up Form</title>
        <link rel="stylesheet" href="/css/login-signup.css">
        <script
            src="https://kit.fontawesome.com/64d58efce2.js"
            crossorigin="anonymous">
        </script>
        <title>Sign In & Sign Up</title>
    </head>

    <body>
       <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form method="POST" action="{{ route('login') }}" class="sign-in-form">
                    @csrf
                    <h2 class="title">Sign in</h2>
                    <div class="input-field @error('email') error_border @enderror">
                        <i class="fas fa-user"></i>
                        <input type="email" class="@error('email') is-invalid @enderror" name="email" placeholder="Email">
                     
                       
                    </div>
                     @error('email')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                 
                    
                    <div class="input-field @error('password') error_border @enderror">
                        <i class="fas fa-lock"></i>
                        <input type="password" class="@error('password') is-invalid @enderror"  name="password" placeholder="Password">
                   
                     
                    </div>
                    @error('password')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                    <input type="submit" value="Login" class="btn solid">

                    <p class="social-text">Or Sign in with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
                <form method="POST" action ="{{ route('register') }}" class="sign-up-form" enctype='multipart/form-data'>
                    @csrf
                    <h2 class="title">Sign up</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input  class="@error('company_name') is-invalid @enderror" type="text" name="company_name" placeholder="Company Name">
                      
                    </div> 
                     @error('company_name')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input  class="@error('name') is-invalid @enderror" type="text" name="name" placeholder="Name">
                      
                    </div> 
                     @error('name')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input class="@error('email') is-invalid @enderror" type="email" name="email" placeholder="Email">
                        
                  
                    </div> 
                         @error('email')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input class="@error('password') is-invalid @enderror" type="password" name="password" placeholder="Password">
                        
                    </div>
                    @error('password')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input class="@error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation" placeholder="Confirm Password">
                      
                    </div>
                 @error('password_confirmation')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                          <label>Optional</label>
                    <div class="input-field">
                    
                        <i class="fas fa-image"></i>
                        <input class="@error('img') is-invalid @enderror" style="line-height:3 !important;"  type="file" name="img" >
                       
                    </div>
                   @error('img')
                        <div class="ml-1 text-red-500 text-xs alert alert-danger">{{ $message }}</div>
                        @enderror
                    <input type="submit" value="Sign up" class="btn solid">

                    <p class="social-text">Or Sign up with social platforms</p>
                    <div class="social-media">
                        <a href="#" class="social-icon">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-google"></i>
                        </a>
                        <a href="#" class="social-icon">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit voluptate assumenda facere.</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>

                <img src="img/log.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit voluptate assumenda facere.</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>

                <img src="img/register.svg" class="image" alt="">
            </div>    
        </div>
       </div>
       <script>
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
       <script
            src="/js/loginscript1.js">
        </script>
    </body>
</html>