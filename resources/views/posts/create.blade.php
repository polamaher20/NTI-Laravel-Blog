<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/create.css') }}">
</head>
<body class="container mt-5">

    
    @if ($errors->any())
    <div class="alert alert-danger text-center mx-auto" style="max-width: 600px; border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">
        <ul class="mb-0 list-unstyled">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
    <div class="card shadow-lg mx-auto mt-4" style="max-width: 700px; border-radius: 12px;">
        <h1 class="text-center my-5">Create New Post</h1>
        <div class="card-body p-4">
            <form action="{{ route('posts.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label fw-bold">Title</label>
                    <input type="text" name="title" id="title" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="content" class="form-label fw-bold">Content</label>
                    <textarea name="content" id="content" rows="5" class="form-control" required></textarea>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-success px-4">Save</button>
                    <a href="{{ route('posts.index') }}" class="btn btn-secondary px-4">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</body>
</html>
