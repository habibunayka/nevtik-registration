@extends('admin.layout')

@section('content')
    <div class="title">Edit Post</div>

    <form action="{{ route('admin.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $post->name) }}" required>
        </div>

        <div class="form-group">
            <label for="link">Link:</label>
            <input type="url" id="link" name="link" class="form-control" value="{{ old('link', $post->link) }}" required>
        </div>

        <div class="form-group">
            <label for="status">Status:</label>
            <select id="status" name="status" class="form-control" required>
                <option value="open" {{ $post->status == 'open' ? 'selected' : '' }}>Open</option>
                <option value="coming soon" {{ $post->status == 'coming soon' ? 'selected' : '' }}>Coming Soon</option>
                <option value="closed" {{ $post->status == 'closed' ? 'selected' : '' }}>Closed</option>
            </select>
        </div>

        <div class="form-group">
            <label for="due">Due:</label>
            <input type="date" id="due" name="due" class="form-control" value="{{ old('due', $post->due) }}" required>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" id="image" name="image" class="form-control">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="Current Image" class="img-thumbnail mt-2" style="max-width: 200px;">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Post</button>
    </form>
@endsection
