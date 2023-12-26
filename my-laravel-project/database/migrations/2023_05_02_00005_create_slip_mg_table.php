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
        //　伝票テーブル
        // 顧客番号:(customer_id)外部キー主キー
        // 社員番号:(staff_id)外部キー主キー
        // 日時:(ap_day)主キー
        // 会計金額:(acc_am)
        Schema::create('slip_mgs', function (Blueprint $table) {
            $table->unsignedBigInteger('slip_id')->autoIncrement();
            $table->unsignedBigInteger('customer_id');
            $table->date('ap_day');
            $table->unsignedInteger('total');
            $table->unsignedBigInteger('responsibility');//入力担当者ID
            $table->rememberToken();
            $table->timestamps();
            //制約
            $table->foreign('customer_id')->references('customer_id')->on('customers');
            $table->foreign('responsibility')->references('staff_id')->on('employees');
            $table->unique(['customer_id','responsibility','ap_day']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slip_mg');
    }
};
