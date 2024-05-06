<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->string('companys_name')->nullable();
            $table->string('id_num')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            $table->string('agents_name')->nullable();
            $table->string('agent_phone1')->nullable();
            $table->string('typ')->nullable();
            $table->string('nash')->nullable();
            $table->string('Duration')->nullable();
            $table->integer('countss')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('sadad_typ')->nullable();
            $table->string('WORK')->nullable();
            $table->string('emp_num')->nullable();
            $table->string('emp_name')->nullable();
            $table->unsignedBigInteger('maids_id')->nullable();
            $table->foreign('maids_id')->references('id')->on('maids')->onDelete('cascade');
            $table->string('status')->nullable();

            $table->decimal('sadad',8,2)->nullable();
            $table->date('exp_sadad')->nullable();


            $table->decimal('emp_salary',8,2)->nullable();

            $table->decimal('tamin',8,2)->nullable();

            $table->decimal('vat_cost',8,2)->nullable();

            $table->decimal('cost',8,2)->nullable();

            $table->decimal('man_discount',8,2)->nullable();

            $table->decimal('rest',8,2)->nullable();

            $table->decimal('tot',8,2)->nullable();

            $table->date('end_contract_date')->nullable();
            $table->string('end_comment', 999)->nullable();
            $table->string('end_reson', 999)->nullable();
            $table->string('end_by', 999)->nullable();
            $table->string('remaining_days', 999)->nullable();
            $table->string('late_days', 999)->nullable();
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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::dropIfExists('contracts');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');


    }
}
