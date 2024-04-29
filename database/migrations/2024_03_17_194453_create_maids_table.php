<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMaidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maids', function (Blueprint $table) {
            $table->id();
           //المعلومات الاساسية
            $table->string('emp_num');
            $table->string('emp_name_ar')->nullable();
            $table->string('emp_name_en')->nullable();
            $table->string('emp_relegon')->nullable();
            $table->string('emp_work')->nullable();
            $table->string('emp_gender')->nullable();
            $table->string('emp_nash')->nullable();
            $table->string('emp_salary')->nullable();
            $table->string('emp_wakel')->nullable();
            $table->string('emp_employee')->nullable();
            $table->string('emp_box_num')->nullable();
            $table->string('emp_hodod_num')->nullable();
            $table->string('status')->nullable();
            $table->string('status_id')->nullable();
            $table->string('connected')->nullable();
            $table->string('connected_con_id')->nullable();

            // البيانات الشخصية

            $table->date('age_date');
            $table->string('age')->nullable();
            $table->string('emp_add_ar')->nullable();
            $table->string('emp_add_en')->nullable();
            $table->string('emp_m_status')->nullable();
            $table->string('emp_num_of_ch')->nullable();
            $table->string('emp_weight')->nullable();
            $table->string('emp_length')->nullable();
            $table->string('emp_edu_ar')->nullable();
            $table->string('emp_edu_en')->nullable();
            $table->string('emp_phone')->nullable();
            $table->string('emp_phone2')->nullable();
            $table->string('emp_id_num')->nullable();

            //  معلومات الجواز
            $table->string('emp_passport');
            $table->date('emp_passport_date')->nullable();
            $table->date('emp_passport_end_date')->nullable();
            $table->string('emp_isdar_ar')->nullable();
            $table->string('emp_name_of_ahal_ar')->nullable();
            $table->string('emp_name_of_ahal_en')->nullable();
            $table->string('emp_name_of_ahal_phne')->nullable();
            $table->string('emp_isdar_en')->nullable();

            //   خبرات سابقة

            $table->string('emp_is_work')->nullable();

            //   المهارات

            $table->string('emp_cook')->nullable();
            $table->string('emp_wash')->nullable();
            $table->string('emp_clean')->nullable();
            $table->string('emp_children')->nullable();
            $table->string('emp_tilor')->nullable();
            $table->string('emp_drive')->nullable();

            //   اللغات
            $table->string('emp_arabic_lan')->nullable();
            $table->string('emp_english_lan')->nullable();
            //   المعلومات الاضافية
            $table->string('emp_type')->nullable();
            $table->string('file_name')->nullable();
            $table->string('passport_pic')->nullable();
            $table->string('full_pic')->nullable();


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
        Schema::dropIfExists('maids');
    }
}
