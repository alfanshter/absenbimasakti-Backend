<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePpeJobSafetiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ppe_job_safeties', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('sequence_of_job_step');
            $table->string('potential_hazard');
            $table->string('reduce_potential');
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
        Schema::dropIfExists('ppe_job_safeties');
    }
}
