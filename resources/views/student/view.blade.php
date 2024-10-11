@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Student Details</h1>

        <div class="card">
            <div class="card-body">
                <h3>{{ $student->name }}</h3>
                <p>Email: {{ $student->email }}</p>
                <p>Borrowed Books:</p>
                <ul>
                    @foreach($student->borrowedBooks as $borrowedBook)
                        <li>{{ $borrowedBook->book->title }} - Borrowed At: {{ $borrowedBook->borrowed_at }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
