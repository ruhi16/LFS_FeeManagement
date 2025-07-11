<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFee08CollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee08_collections', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('myclass_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->unsignedBigInteger('studentcr_id')->nullable();

            $table->unsignedBigInteger('fee_mandate_id')->nullable();
            $table->unsignedBigInteger('fee_mandate_date_id')->nullable();

            $table->decimal('total_amount',10,2)->nullable();
            $table->boolean('is_paid')->default(false);
            $table->date('paid_date')->nullable();
            $table->string('payment_mode')->nullable();

            // $table->string('student_record_id')->nullable();




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
        Schema::dropIfExists('fee08_collections');
    }
}
