<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\BorrowedBook;

class Book extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'author', 'description'];

    public function borrowedBooks()
    {
        return $this->hasMany(BorrowedBook::class);
    }
}
