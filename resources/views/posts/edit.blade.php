<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Post</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body class="d-flex justify-content-center align-items-center min-vh-100">

    <div class="card shadow-lg p-4" style="max-width: 600px; width: 100%; border-radius: 12px;);">
        
        <h1 class="mb-4 text-center text-primary text-white">Edit Post</h1>

    
        @if ($errors->any())
            <div class="alert alert-danger text-center mb-3" style="border-radius: 8px; box-shadow: 0 4px 10px rgba(0,0,0,0.2);">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label fw-bold">Title</label>
                <input type="text" name="title" id="title" 
                    class="form-control" value="{{ $post->title }}" required>
            </div>

            <div class="mb-3">
                <label for="content" class="form-label fw-bold">Content</label>
                <textarea name="content" id="content" rows="5" class="form-control" required>{{ $post->content }}</textarea>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>
                <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
    </div>

</body>
</html>
