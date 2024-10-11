@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <h1 class="mb-4 text-white text-center">Admin Dashboard</h1>

        <!-- Borrowed Books Section -->
        <div class="card mb-4">
            <div class="card-header bg-primary text-white">
                <h2>Borrowed Books</h2>
            </div>
            <div class="card-body">
                @if($borrowedBooks->isEmpty())
                    <p class="text-muted">No books have been borrowed yet.</p>
                @else
                    <ul class="list-group">
                        @foreach ($borrowedBooks as $borrowedBook)
                            <li class="list-group-item">
                                <strong>{{ $borrowedBook->book->title }}</strong>
                                <span class="text-muted"> borrowed by </span>
                                {{ $borrowedBook->user->name }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <!-- All Books Section -->
        <div class="card mb-4">
            <div class="card-header bg-success text-white">
                <h2>All Books</h2>
            </div>
            <div class="card-body">
                @if($books->isEmpty())
                    <p class="text-muted">No books are available.</p>
                @else
                    <ul class="list-group">
                        @foreach ($books as $book)
                            <li class="list-group-item">
                                {{ $book->title }} <span class="text-muted">by</span> {{ $book->author }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>

        <!-- All Users Section -->
        <div class="card mb-4">
            <div class="card-header bg-info text-white">
                <h2>All Users</h2>
            </div>
            <div class="card-body">
                @if($students->isEmpty())
                    <p class="text-muted">No users found.</p>
                @else
                    <ul class="list-group">
                        @foreach ($students as $student)
                            <li class="list-group-item">
                                {{ $student->name }}
                            </li>
                        @endforeach
                    </ul>
                @endif
            </div>
        </div>
    </div>
@endsection
