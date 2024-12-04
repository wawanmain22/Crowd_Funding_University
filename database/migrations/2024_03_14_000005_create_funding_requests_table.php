<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('funding_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_student_id')->constrained('students');
            $table->foreignId('user_reviewer_id')->nullable()->constrained('admins');
            $table->decimal('amount_requested', 12, 2);
            $table->text('reason');
            $table->string('supporting_document');
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            $table->text('reviewer_note')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('funding_requests');
    }
};
