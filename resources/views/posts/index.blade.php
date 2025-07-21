<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
    <title>Posts</title>
</head>
<body>
    <div class="container">

        <h1>Active Users</h1>
        <a class="add-posts" href="{{route('posts.create')}}">Add User</a>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="posts-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Created</th>
                    <th>Last Updated</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($posts as $post)
                <tr>
                    <td>{{$post->name}}</td>
                    <td>{{$post->email}}</td>
                    <td>{{$post->created_at->format('n/j/y g:ia')}}</td>
                    <td>{{$post->updated_at->format('n/j/y g:ia')}}</td>
                    <td class="actions">
                        <a class="edit-post" href="{{route('posts.edit', $post->id)}}">Edit</a>
                        <form  class="delete-post" action="{{route('posts.destroy', $post->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="delete-btn" type="submit" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">No posts found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
        {{$posts->links()}}
    </div>
</body>
</html>