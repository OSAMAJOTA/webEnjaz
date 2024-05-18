<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWakelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wakels', function (Blueprint $table) {
            $table->id();
            $table->string('wakel_name');
            $table->string('phone');
            $table->string('add_ar');
            $table->string('wakel_name_en');
            $table->string('phone2');
            $table->string('add_en');
            $table->string('login_name');
            $table->string('email');
            $table->string('company_name_ar');

            $table->string('nash');
            $table->string('wakel_type');

            $table->string('company_name_en');
            $table->string('wakel_id');
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
        Schema::dropIfExists('wakels');
    }
}
