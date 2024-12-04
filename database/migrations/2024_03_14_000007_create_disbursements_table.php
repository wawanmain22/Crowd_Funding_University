<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('disbursements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('funding_request_id')->constrained();
            $table->foreignId('user_reviewer_id')->constrained('admins');
            $table->decimal('amount', 12, 2);
            $table->string('disbursement_proof');
            $table->enum('status', ['pending', 'completed', 'failed'])->default('pending');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('disbursements');
    }
};
