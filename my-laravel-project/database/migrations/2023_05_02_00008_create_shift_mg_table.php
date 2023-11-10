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
    public function up()
    {
        Schema::create('shift_mgs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('staff_id');
            $table->date('request_date');
            $table->Time('start_time')->default('21:00');
            $table->Time('end_time')->nullable()->default(null);
            $table->unsignedBigInteger('num_people')->nullable()->default(null);//同伴人数
            $table->timestamps();
        
            $table->unique(['staff_id','request_date']);
            //制約
            $table->foreign('staff_id')->references('staff_id')->on('employees');//外部キー
        });
    }
    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shift_mg');
    }
};
