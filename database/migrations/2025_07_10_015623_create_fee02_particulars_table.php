<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFee02ParticularsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee02_particulars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable();

            $table->string('name')->unique();
            $table->string('description')->nullable(); 
            


            $table->boolean('is_active')->nullable()->default(true);
            $table->string('remarks')->nullable();
            $table->string('status')->nullable();
            $table->integer('school_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fee02_particulars');
    }
}
