<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id', 'title', 'author', 'publisher', 'year_published', 'edition', 'ISBN','copies',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function loanedBooks(){
        return $this->hasMany(LoanedBook::class);
    }
}
