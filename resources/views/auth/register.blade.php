<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Register</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
<link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger text-center mx-auto my-3"
        style="width: 400px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.2); 
                position: absolute; top: 0; left: 50%; transform: translateX(-50%); z-index: 1000;">
        <ul class="mb-0 list-unstyled">
            @foreach ($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">

    <form method="POST" action="{{ route('register.store') }}" class="form mt-3">
        <h1 class="my-3 text-center text-white">Create Account</h1>
        @csrf

        <div class="my-4">
            <div class="mb-3">
                <label class="form-label my-2 text-white">Name</label>
                <input name="name" type="text" class="form-control" required value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label class="form-label my-2 text-white">Email</label>
                <input name="email" type="email" class="form-control" required value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label class="form-label my-2 text-white">Password</label>
                <input name="password" type="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label class="form-label my-2 text-white">Confirm Password</label>
                <input name="password_confirmation" type="password" class="form-control" required>
            </div>
        </div>

        <div class="d-flex justify-content-center align-items-center my-4">
            <button class="btn btn-success mx-2 px-4">Register</button>
            <a href="{{ route('posts.index') }}" class="btn btn-secondary mx-2">Back</a>
        </div>

        <div class="text-center text-white">
            Already have an account? 
            <a href="{{ route('login') }}" class="btn-link text-white px-1">Login</a>
        </div>
    </form>
</div>

</body>
</html>
