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
        Schema::create('reserve_mg', function (Blueprint $table) {
            $table->unsignedBigInteger('reserve_id')->primary();
            $table->string('customer');
            $table->unsignedBigInteger('staff_id');
            $table->date('reserve_date');

            $table->time('reserve_time')->default(null);
            $table->unsignedInteger('reserve_people')->default(null);
            $table->unsignedInteger('table_num')->default(null);
            $table->string('remarks')->default(null);
            $table->unsignedBigInteger('upper_limit')->default(0);
            
            // 制約
            $table->foreign('staff_id')->references('staff_id')->on('employee');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserve_mg');
    }
};
