@if(session('success'))
    <div class="alert alert-success alert-fixed">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-fixed">
        {{ session('error') }}
    </div>
@endif

@if(Auth::check())
    <div class="welcome-box d-flex justify-content-between align-items-center p-3 mb-4">
        <h2 class="m-0">Welcome, {{ Auth::user()->name }}</h2>
        <div>
            <a href="{{ route('posts.create') }}" class="btn btn-primary mx-2">Create Post</a>
            <form action="{{ route('logout') }}" method="POST" style="display:inline-block;">
                @csrf
                <button class="btn btn-danger mx-2">Logout</button>
            </form>
        </div>
    </div>
@endif


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Posts</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
</head>
<body class="container mt-5">
    <div class="all d-flex flex-column align-items-center justify-content-center">
        <h1 class="h1 mb-4 text-center">All Posts</h1>

        @if($posts->count())
            <div class="table-responsive shadow rounded-3 w-100">
                <table class="table table-bordered table-striped table-hover mb-0 rounded-3">
                    <thead class="table-dark">
                        <tr>
                            <th>Title</th>
                            <th>Content</th>
                            <th style="width: 200px;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $post)
                        <tr>
                            <td>
                                <a href="{{ route('posts.show', $post->id) }}">{{ $post->title }}</a>
                            </td>
                            <td>{{ $post->content }}</td>
                            <td>
                                @if(Auth::check() && Auth::id() === $post->user_id)
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>

                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" style="display:inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Delete?')">Delete</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="alert alert-info w-50 text-center">No Posts Available</div>
        @endif
    </div>
</body>
</html>
