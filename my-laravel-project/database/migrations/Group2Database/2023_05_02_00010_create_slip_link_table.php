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
        Schema::create('slip_links', function (Blueprint $table) {
            $table->unsignedBigInteger('slip_id');
            $table->unsignedBigInteger('staff_id');
            $table->rememberToken();
            $table->timestamps(); 

            //外部キー
            $table->foreign('staff_id')->references('staff_id')->on('employees');
            $table->foreign('slip_id')->references('slip_id')->on('slip_mgs');
            //主キー
            $table->primary(['staff_id','slip_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('slip_links');
    }
};
