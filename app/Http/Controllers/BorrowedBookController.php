<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorrowedBookController extends Controller
{
    public function borrow(Book $book) {
        BorrowedBook::create([
            'user_id' => auth()->id(),
            'book_id' => $book->id,
            'borrowed_at' => now(),
            'return_by' => now()->addDays(14),
        ]);
        return redirect('/student/dashboard')->with('success', 'Book borrowed successfully');
    }
}
