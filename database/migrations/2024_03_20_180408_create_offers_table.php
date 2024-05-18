<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('nash');
            $table->string('countss');

            $table->string('tamin');
            $table->string('work');
            $table->string('cost');
            $table->string('Duration');
            $table->string('is_work');
            $table->string('vat_cost');
            $table->string('emp_salary');
            $table->string('Total');
            $table->string('active');
            $table->string('nash_Duration');

            $table->string('Created_by', 999);
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
        Schema::dropIfExists('offers');
    }
}
