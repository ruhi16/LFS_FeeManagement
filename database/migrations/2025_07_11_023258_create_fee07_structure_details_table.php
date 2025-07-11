<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFee07StructureDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee07_structure_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fee_structure_id')->nullable();

            $table->string('name')->nullable();
            $table->string('description')->nullable();            
            
            $table->unsignedBigInteger('fee_category_id')->nullable();
            $table->unsignedBigInteger('fee_particular_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();            
                        
            $table->boolean('is_special')->nullable()->default(false);
            $table->string('fee_mandate_date_ids')->nullable();
            
            $table->boolean('is_studentcr_special')->nullable()->default(false);
            $table->unsignedBigInteger('studentcr_id')->nullable();
            $table->string('fee_collection_reasons')->nullable();


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
        Schema::dropIfExists('fee07_structure_details');
    }
}
