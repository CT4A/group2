<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //酒管理
        Schema::create('liquor_mgs', function (Blueprint $table) {
            $table->unsignedBigInteger('liquor_id')->autoIncrement();
            $table->string('liquor_name');
            $table->string('liquor_type');

            $table->integer('liquor_number')->default(1);            
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
        Schema::dropIfExists('liquor_mg');
    }
};