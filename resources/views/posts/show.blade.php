<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
</head>
<body>

    <div class="container mt-5 d-flex flex-column align-items-center">
        <div class="card p-4 mb-4">
            <h2 class="text-center mt-3">Post Details</h2>
            <hr>
            <h3>Title:</h3>
            <p class="pb-3">{{ $post->title }}</p>
            <h3>Content:</h3>
            <p>{{ $post->content }}</p>
            <hr>
            <small class="text-light">Created at: {{ $post->created_at->setTimezone('Africa/Cairo')->format('Y-m-d h:i') }}</small>

        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('posts.index') }}" class="btn btn-secondary">Back</a>

            @if(Auth::check() && Auth::id() === $post->user_id)
                <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Delete this post?')">Delete</button>
                </form>
            @endif
        </div>
    </div>

</body>
</html>
