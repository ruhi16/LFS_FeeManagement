<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFee05CatelogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fee05_catelogs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('myclass_id')->nullable();
            $table->unsignedBigInteger('fee_category_id')->nullable();
            $table->unsignedBigInteger('fee_particular_id')->nullable();
            $table->decimal('amount', 10, 2)->nullable();

            $table->string('fee_collection_type')->nullable();  // 1. Regular, 2. Special, 3. Student-fee 4. Other

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
        Schema::dropIfExists('fee05_catelogs');
    }
}
