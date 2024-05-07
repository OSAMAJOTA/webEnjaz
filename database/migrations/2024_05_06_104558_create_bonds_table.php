<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBondsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bonds', function (Blueprint $table) {
            $table->id();
            $table->string('bonds_type', 999)->nullable();
            $table->string('bonds_type_id', 999)->nullable();
            $table->string('catch_type', 999)->nullable();
            $table->decimal('bonds_vat',8,2)->nullable();;
            $table->decimal('bonds_cost',8,2)->nullable();;
            $table->decimal('bonds_total',8,2)->nullable();;
            $table->string('bonds_vat_ar', 999)->nullable();
            $table->string('bonds_cost_ar', 999)->nullable();
            $table->string('bonds_total_ar', 999)->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->string('comment', 999)->nullable();
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
        Schema::dropIfExists('bonds');
    }
}
