<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">

    <title>Add User</title>
</head>
<body>
    <div class="container">

        <h1>Add New User</h1>
        <form class="create-post" action="{{route('posts.store')}}" method="POST">
            @csrf
            <label>Name</label><br>
            <input type="text" name="name" required><br>
            <label>Email</label><br>
            <input type="email" name="email" required><br>
            <button type="submit">Add Post</button>
        </form>
        <a class="home-btn" href="/posts"> <span>&lArr;</span> Back</a>
    </div>
</body>
</html>