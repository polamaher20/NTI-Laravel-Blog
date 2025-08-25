<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Login</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>
<body class="container">
    

@if (session('success'))
    <div class="alert alert-success text-center mx-auto my-3" 
        style="width: 400px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); position: absolute; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1000;">
        {{ session('success') }}
    </div>
@endif

@if(session('not_registered'))
    <div class="alert alert-warning text-center mx-auto my-3"
        style="width: 400px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
                position: absolute; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1000;">
        Please register first.
    </div>
@endif

@if(session('invalid_credentials'))
    <div class="alert alert-danger text-center mx-auto my-3"
        style="width: 400px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.1); 
            position: absolute; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1000;">
        Invalid email or password.
    </div>
@endif



<div class="container">
    <form method="POST" action="{{ route('login.check') }}" class="form mt-3">
        <h1 class="my-3 text-center text-white" >Login</h1>
        @csrf

        <div class="my-4">
            <div class="mb-3">
                <label class="form-label my-3 text-white">Email</label>
                <input name="email" type="email" class="form-control" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label class="form-label text-white">Password</label>
                <input name="password" type="password" class="form-control" required>
            </div>
        </div>
        

        <div class="d-flex justify-content-center align-items-center my-5">
            <button class="btn btn-primary mx-2 px-4">Login</button>
        </div>
        <div class="text-center">
            <span class="Sign-up text-white">Don't have an account?</span>  <a href="{{ route('register') }}" class="btn-link px-1 text-white">Sign up</a>
        </div>
    </form>
</div>
</body>
</html>
