@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-center">Add a New Book</h1>

        <form method="POST" action="{{ route('admin.books.store') }}">
            @csrf
            <div class="form-group mb-3">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" placeholder="Enter book title" required>
            </div>
            <div class="form-group mb-3">
                <label for="author">Author</label>
                <input type="text" name="author" id="author" class="form-control" placeholder="Enter author name" required>
            </div>
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" placeholder="Enter book description" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Add Book</button>
        </form>
    </div>
@endsection
