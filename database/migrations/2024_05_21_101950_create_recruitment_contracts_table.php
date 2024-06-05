<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruitmentContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitment_contracts', function (Blueprint $table) {

            $table->id();
            $table->string('companys_name')->nullable();
            $table->string('id_num')->nullable();
            $table->unsignedBigInteger('agent_id')->nullable();
            $table->foreign('agent_id')->references('id')->on('agents')->onDelete('cascade');
            $table->string('agents_name')->nullable();
            $table->string('agent_phone1')->nullable();
            $table->string('musaned_cont')->nullable();
            $table->string('musaned_tawthiq')->nullable();
            $table->string('emp_typ2')->nullable();
            $table->string('Age')->nullable();
            $table->string('religion')->nullable();
            $table->string('emp_exp')->nullable();
            $table->string('another_exp')->nullable();

            $table->string('nash')->nullable();
            $table->string('WORK')->nullable();
            $table->string('work_emp')->nullable();


            $table->string('sadad_typ')->nullable();
            $table->string('hasVisa')->nullable();
            $table->string('visa_number')->nullable();
            $table->string('hijri_visa')->nullable();
            $table->date('date_visa')->nullable();



            $table->string('visa_pay')->nullable();
            $table->string('destination', 999)->nullable();

            $table->decimal('salary',8,2)->nullable();

            $table->decimal('istgdam_cost',8,2)->nullable();

            $table->decimal('wakell_cost',8,2)->nullable();

            $table->decimal('cost_vat',8,2)->nullable();

            $table->decimal('total_value',8,2)->nullable();

            $table->decimal('man_dis',8,2)->nullable();

            $table->decimal('DiscountOfficeCosts',8,2)->nullable();
            $table->decimal('sadad',8,2)->nullable();

            $table->decimal('rest',8,2)->nullable();

            $table->date('cont_date')->nullable();
            $table->string('Status')->nullable();

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
        Schema::dropIfExists('recruitment_contracts');
    }
}
