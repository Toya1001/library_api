<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanedBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'member_id', 'book_id',	'date_issued', 'due_date', 'copies_borrowed', 'processed_by', 'date_returned', 'receieved_by', 'returned', 'overdue',
    ];

    public function member(){
        return $this->belongsTo(Member::class);
    }

    public function book(){
        return $this->belongsTo(Book::class);
    }
}

