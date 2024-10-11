<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function dashboard()
    {
        $student = Auth::user();
        $borrowedBooks = $student->borrowedBooks()->with('book')->get();

        return view('student.dashboard', compact('borrowedBooks'));
    }

    public function returnBook($id)
    {
        $borrowedBook = Auth::user()->borrowedBooks()->findOrFail($id);
        $borrowedBook->delete(); 
        
        return redirect()->route('student.dashboard')->with('success', 'Book returned successfully');
    }

    public function viewBooks()
    {
        $books = Book::all();
    
        return view('student.books.index', compact('books'));
    }
    
    public function borrowBook($id)
    {
        $book = Book::findOrFail($id);
    
        BorrowedBook::create([
            'user_id' => Auth::id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'return_by' => now()->addDays(7), 
        ]);
    
        return redirect()->route('student.dashboard')->with('success', 'Book borrowed successfully');
    }
    
}
