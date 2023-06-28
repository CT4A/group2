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
            $table->string('password')->default(bcrypt("test"));
            $table->string('staff_name');
            $table->string('role')->default('staff');
            $table->string('tel')->unique();
            $table->string('residence');
            $table->unsignedBigInteger('hourly_wage');
            $table->date('birthday');
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
