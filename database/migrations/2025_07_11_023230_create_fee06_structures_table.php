<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFee06StructuresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee06_structures', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('financial_year_id')->nullable();
            $table->bigInteger('myclass_id')->nullable();
            $table->bigInteger('fee_mandate_id')->nullable();

            $table->string('name')->nullable();
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
        Schema::dropIfExists('fee06_structures');
    }
}
