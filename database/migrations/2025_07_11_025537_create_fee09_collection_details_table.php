<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFee09CollectionDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee09_collection_details', function (Blueprint $table) {
            
            $table->id();
            $table->unsignedBigInteger('fee_collection_id')->nullable();

            $table->unsignedBigInteger('fee_structure_id')->nullable();
            $table->unsignedBigInteger('fee_structure_detail_id')->nullable();
            
            $table->unsignedBigInteger('fee_category_id')->nullable();
            $table->unsignedBigInteger('fee_particular_id')->nullable();
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
        Schema::dropIfExists('fee09_collection_details');
    }
}
