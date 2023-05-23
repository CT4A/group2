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
            // 番号:(staff_id)　主キー
            // パスワード:(staff_pass)
            // 社員名:(staff_name)
            // 電話番号:(tel)
            // 住所:(residence)
            // 時給:(hourly_wage)
            // 誕生日:(birthday)
            // 備考:(remarks)
        Schema::create('employees', function (Blueprint $table) {
            $table->unsignedBigInteger('staff_id')->autoIncrement();
            $table->string('staff_pass');
            $table->string('staff_name');
            $table->string('tel')->nullable();
            $table->string('residence')->nullable();
            $table->string('hourly_wage')->nullable();
            $table->string('birthday')->nullable();
            $table->string('remarks')->nullable();
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
