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
        Schema::create('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_id')->autoIncrement();
            $table->string('staff_pass');
            $table->string('staff_name');
            $table->string('tel');
            $table->string('residence');
            $table->string('hourly_wage');
            $table->string('birthday');
            $table->string('remarks')->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employee');
    }
};
