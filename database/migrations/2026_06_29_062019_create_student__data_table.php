<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('student__data', function (Blueprint $table) {
            $table->id();
            // Student details
            $table->string('name');
            $table->string('class');
            $table->string('section');
            $table->string('roll_number');
            $table->date('date_of_birth');
            $table->string('admission_number');
            // Parents details
            $table->string('father_name');
            $table->string('mother_name');
            $table->string('contact_number');
            $table->string('alternate_contact_number')->nullable();
            $table->string('address');
            // Leaving details
            $table->date('leaving_date');
            $table->enum('tc_status', ['issued', 'pending'])->default('pending');
            $table->string('leaving_reason');
            $table->string('transfer_to_school')->nullable();
            $table->date('tc_date_issued')->nullable();
            $table->string('document')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student__data');
    }
};
