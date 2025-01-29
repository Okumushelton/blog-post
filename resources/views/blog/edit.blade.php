<!DOCTYPE html>
<html>
<head>
    <title>Edit Blog Post</title>
</head>
<body>
    <h1>Edit Blog Post</h1>
    <form action="{{ url('/blog/'.$post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" name="title" value="{{ $post->title }}" required minlength="5">
        <br>
        <label for="content">Content:</label>
        <textarea name="content" required>{{ $post->content }}</textarea>
        <br>
        <button type="submit">Update Post</button>
    </form>
</body>
</html>
