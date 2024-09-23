@extends('admin.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Create New Post</h1>
    <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="link" class="form-label">Link</label>
            <input type="url" class="form-control" id="link" name="link" required>
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select id="status" name="status" class="form-select" required>
                <option value="open">Open</option>
                <option value="coming">Coming</option>
                <option value="close">Close</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="due" class="form-label">Due Date</label>
            <input type="date" id="due" name="due" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Upload Image</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('admin.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
