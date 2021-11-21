<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoanedBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loaned_books', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained();
            $table->foreignId('book_id')->constrained();
            $table->date('date_issued');
            $table->date('due_date');
            $table->integer('copies_borrowed');
            $table->string('processed_by');
            $table->date('date_returned')->nullable();
            $table->string('receieved_by')->nullable();
            $table->boolean('returned')->default(0);
            $table->boolean('overdue')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('assign_books');
    }
}
