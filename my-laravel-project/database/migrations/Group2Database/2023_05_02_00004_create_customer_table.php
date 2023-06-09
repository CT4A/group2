<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id')->autoIncrement();
            $table->string('customer_name');
            $table->string('company_name')->nullable()->default('null');
            $table->string('customer_type')->default('customer');
            $table->date('birthday')->nullable()->default(null);
            $table->unsignedBigInteger('staff_id');
            $table->string('remarks')->nullable()->default("null");
            $table->rememberToken();
            $table->timestamps();
            
            $table->foreign('staff_id')->references('staff_id')->on('employees');
        });
    }
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
