<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFee07StrucreMandatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee07_strucre_mandates', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('fee_structure_id')->nullable();
            $table->unsignedBigInteger('fee_mandate_id')->nullable();

            $table->string('name')->nullable();
            $table->string('description')->nullable();



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
        Schema::dropIfExists('fee07_strucre_mandates');
    }
}
