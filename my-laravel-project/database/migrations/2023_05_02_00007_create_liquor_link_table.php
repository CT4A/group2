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
        Schema::create('liquor_links', function (Blueprint $table) {
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('liquor_id');    
            $table->unsignedBigInteger('liquor_number');//自分で入力可能   
            $table->string('group_name')->nullable()->default('なし');
            $table->date('liquor_day');
            $table->string('remarks')->nullable()->default(null);
            $table->rememberToken();
            $table->timestamps();

            //外部キー
            $table->foreign('liquor_id')->references('liquor_id')->on('liquor_mgs');
            $table->foreign('customer_id')->references('customer_id')->on('customers');

            //主キー
            $table->primary(['customer_id','liquor_number']);
        });
    }

    // public function upa(): void
    // {
    //     Schema::create('liquor_link', function (Blueprint $table) {
    //         $table->unsignedBigInteger('id')->primary();
    //         $table->unsignedBigInteger('customer_id')->nullable();
    //         $table->string('group_name')->nullable();

    //         $table->unsignedBigInteger('liquor_id');    
    //         $table->unsignedBigInteger('liquor_number');//自分で入力可能   
    //         $table->datetime('liquor_day')->notnull();
    //         //外部キー
    //         $table->foreign('customer_id')->references('customer_id')->on('slip_mg');
    //         $table->foreign('liquor_id')->references('liquor_id')->on('liquor');
 
    //     });
    // }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
