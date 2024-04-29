<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaidMovmoentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maid_movmoents', function (Blueprint $table) {
            $table->id();
            $table->string('maid_name', 999)->nullable();
            $table->unsignedBigInteger('maid_id')->nullable();
            $table->foreign('maid_id')->references('id')->on('maids')->onDelete('cascade');
            $table->string('end_reson', 999)->nullable();
            $table->dateTime('end_date')->nullable();
            $table->unsignedBigInteger('contract_id')->nullable();
            $table->foreign('contract_id')->references('id')->on('contracts')->onDelete('cascade');
            $table->string('status', 999)->nullable();
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
        Schema::dropIfExists('maid_movmoents');
    }
}
