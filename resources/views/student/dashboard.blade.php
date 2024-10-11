@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Dashboard</h1>

        <h3>Borrowed Books</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Book Title</th>
                    <th>Borrowed At</th>
                    <th>Return By</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($borrowedBooks as $borrowedBook)
                    <tr>
                        <td>{{ $borrowedBook->book->title }}</td>
                        <td>{{ $borrowedBook->borrowed_at }}</td>
                        <td>{{ $borrowedBook->return_by }}</td>
                        <td>
                            <form method="POST" action="{{ route('student.returnBook', $borrowedBook->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Return Book</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
