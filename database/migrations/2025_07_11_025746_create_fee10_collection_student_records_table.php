<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFee10CollectionStudentRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee10_collection_student_records', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('studentcr_id')->nullable(); // Assuming 'studentcr' refers to a student record ID
            $table->unsignedBigInteger('myclass_id')->nullable(); 
            $table->unsignedBigInteger('section_id')->nullable();

            $table->unsignedBigInteger('fee_mandate_id')->nullable();
            $table->unsignedBigInteger('fee_mandate_date_id')->nullable();
            
            $table->unsignedBigInteger('fee_collection_id')->nullable();






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
        Schema::dropIfExists('fee10_collection_student_records');
    }
}
