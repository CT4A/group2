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
        Schema::create('salarys', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_id')->primary();
            $table->date('salary_date');
            $table->unsignedBigInteger('basic_salary');
            $table->unsignedBigInteger('total_working_days');
            $table->unsignedBigInteger('total_time');
            $table->unsignedBigInteger('total_money_people');//同伴金額
            $table->unsignedBigInteger('deduction');//控除金額
            $table->unsignedBigInteger('total');//総合金額
            $table->unsignedBigInteger('total_branch');//総支給額（手取り額）
        
            $table->rememberToken();
            $table->timestamps(); 
            //外部キー
            $table->foreign('staff_id')->references('staff_id')->on('employees');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salarys');
    }
};
