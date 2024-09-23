@extends('admin.layout')

@section('content')

    <a href="{{ route('admin.create') }}" class="btn btn-primary">Create New Post</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Link</th>
                <th>Status</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
                <tr>
                    <td>{{ $post->name }}</td>
                    <td><a href="{{ $post->link }}" target="_blank">{{ $post->link }}</a></td>
                    <td>{{ ucfirst($post->status) }}</td>
                    <td><img src="{{ $post->image }}" alt="{{ $post->name }}" style="width: 100px; height: auto;"></td>
                    <td>
                        <a href="{{ route('admin.edit', $post->id) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('admin.destroy', $post->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
