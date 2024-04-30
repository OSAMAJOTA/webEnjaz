<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaidHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maid_histories', function (Blueprint $table) {
            $table->id();
            $table->string('contract_type', 999)->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->unsignedBigInteger('maid_id')->nullable();
            $table->foreign('maid_id')->references('id')->on('maids')->onDelete('cascade');
            $table->unsignedBigInteger('agents_id')->nullable();
            $table->foreign('agents_id')->references('id')->on('agents')->onDelete('cascade');
            $table->string('agents_name')->nullable();
            $table->string('Duration')->nullable();
            $table->string('maid_rate')->nullable();
            $table->date('str_date')->nullable();
            $table->date('end_date')->nullable();
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
        Schema::dropIfExists('maid_histories');
    }
}
