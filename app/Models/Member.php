<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',	'email', 'street_address','apt_no', 'town','parish','contact_no','status',
    ];

    public function loanedBooks(){
        return $this->hasMany(LoanedBook::class);
    }
}
