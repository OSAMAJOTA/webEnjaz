<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_offers', function (Blueprint $table) {
            $table->id();
            $table->string('emp_typ');
            $table->string('nash');

            $table->string('work');
            $table->string('religion')->nullable();
            $table->string('Age')->nullable();
            $table->string('emp_exp')->nullable();
            $table->string('salary')->nullable();
            $table->string('cost2');
            $table->string('vat_cost');
            $table->string('outcost2');
            $table->string('total_offer');
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
        Schema::dropIfExists('recruitment_offers');
    }
}
