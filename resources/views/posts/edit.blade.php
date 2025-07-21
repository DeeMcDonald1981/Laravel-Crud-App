<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
    <title>Edit User</title>
</head>
<body>
    <div class="container">

        <h1>Edit User</h1>
        <form class="edit-form" action="{{route('posts.update', $posts->id)}}" method="POST">
            @csrf
            @method('PUT')
                <label>Name</label><br>
                <input type="text" name="name" value="{{$posts->name}}" required><br>
                <label>Email</label><br>
                <input type="email" name="email" value="{{$posts->email}}" required><br>
                <button type="submit">Update User</button>
        </form>
        <a class="home-btn" href="/posts"> <span>&lArr;</span> Back</a>
    </div>
</body>
</html>