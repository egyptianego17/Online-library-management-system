<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Student\StudentController;
use App\Http\Controllers\Admin\AdminController;
use App\Models\Book;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $books = Book::all();
    return view('dashboard', ['books'=>$books]);
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::resource('/admin/books', BookController::class); 
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/student/dashboard', [StudentController::class, 'index']);
    Route::post('/student/borrow/{book}', [BorrowedBookController::class, 'borrow']);
});


Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::resource('/admin/books', BookController::class);
});

Route::get('/admin/search-student', [AdminController::class, 'searchStudent'])->name('admin.searchStudent');
Route::get('/admin/student/{id}', [AdminController::class, 'viewStudent'])->name('admin.viewStudent');


Route::group(['middleware' => ['auth']], function () {
    Route::get('/student/dashboard', [StudentController::class, 'dashboard'])->name('student.dashboard');
    Route::delete('/student/return-book/{id}', [StudentController::class, 'returnBook'])->name('student.returnBook');
});

Route::get('/student/books', [StudentController::class, 'viewBooks'])->name('student.viewBooks');
Route::get('/student/borrow-book/{id}', [StudentController::class, 'borrowBook'])->name('student.borrowBook');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
});


require __DIR__.'/auth.php';
