
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
                    <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">{{ $message }}</span>
                        <div>
                            <span class="font-medium">Danger alert!</span> Change a few things up and try submitting again.
                        </div>
                    </div>
                    <!-- <div class="alert alert-danger error-login">{{ $message }}</div> -->
                @enderror
                    <input type="password" class="@error('password') is-invalid @enderror"  name="password" placeholder="Password">
                    @error('password')
                    <div  class="alert error-login alert-danger">{{ $message }}</div>
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
    </body>
</html>