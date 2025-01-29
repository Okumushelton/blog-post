<!DOCTYPE html>
<html>
<head>
    <title>Create Blog Post</title>
</head>
<body>
    <h1>Create Blog Post</h1>
    <form action="{{ url('/blog') }}" method="POST">
        @csrf
        <label for="title">Title:</label>
        <input type="text" name="title" required minlength="5">
        <br>
        <label for="content">Content:</label>
        <textarea name="content" required></textarea>
        <br>
        <button type="submit">Create Post</button>
    </form>
</body>
</html>
