<!DOCTYPE html>
<html>
<head>
    <title>Blog Posts</title>
</head>
<body>
    <h1>Blog Posts</h1>
    <a href="{{ url('/blog/create') }}">Create New Post</a>
    <ul>
        @foreach ($posts as $post)
            <li>
                <strong>{{ $post->title }}</strong> - 
                <a href="{{ url('/blog/'.$post->id.'/edit') }}">Edit</a> | 
                <form action="{{ url('/blog/'.$post->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
                <form action="{{ url('/blog/'.$post->id.'/toggle') }}" method="POST" style="display:inline;">
                    @csrf
                    <button type="submit">{{ $post->published ? 'Unpublish' : 'Publish' }}</button>
                </form>
            </li>
        @endforeach
    </ul>
</body>
</html>
