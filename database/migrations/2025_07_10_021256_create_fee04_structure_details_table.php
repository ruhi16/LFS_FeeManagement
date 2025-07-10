<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFee04StructureDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee04_structure_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('structure_id')->nullable();
            
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('particular_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();            
            
            $table->unsignedBigInteger('financial_year_id')->nullable();
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
        Schema::dropIfExists('fee04_structure_details');
    }
}
