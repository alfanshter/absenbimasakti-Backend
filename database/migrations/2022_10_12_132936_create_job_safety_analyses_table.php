<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJobSafetyAnalysesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_safety_analyses', function (Blueprint $table) {
            $table->id();
            $table->text('ref_id');
            $table->string('job_title');
            $table->string('team_work');
            $table->string('work_location');
            $table->string('number_personal_working');
            $table->enum('every_one_capable_to_work', ['yes', 'no']);
            $table->enum('potensi_tumpahan', ['yes', 'no']);
            $table->enum('work_case', ['yes', 'no']);
            $table->text('id_aar')->nullable();
            $table->text('ppe')->nullable();
            $table->string('user_created');
            $table->string('status');
            $table->text('kode')->nullable();
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
        Schema::dropIfExists('job_safety_analyses');
    }
}
