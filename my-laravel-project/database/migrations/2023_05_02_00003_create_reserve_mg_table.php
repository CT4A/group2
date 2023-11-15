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
        Schema::create('reserve_mgs', function (Blueprint $table) {
            $table->unsignedBigInteger('reserve_id')->autoIncrement();
            $table->string('customer_name');
            $table->unsignedBigInteger('staff_id');
            $table->date('reserve_date');
            $table->time('reserve_time')->nullable()->default(null);
            $table->unsignedInteger('reserve_people')->nullable()->default(null);
            $table->string('remarks')->nullable()->default(null);
            $table->unsignedBigInteger('upper_limit')->default(0);
            $table->rememberToken();
            $table->timestamps();
            // 制約
            $table->foreign('staff_id')->references('staff_id')->on('employees');
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
