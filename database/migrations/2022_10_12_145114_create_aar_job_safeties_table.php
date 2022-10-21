<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAarJobSafetiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aar_job_safeties', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->text('sequence_of_job_step');
            $table->text('potential_hazard');
            $table->text('reduce_potential');
            $table->string('pic');
            $table->text('kode');
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
        Schema::dropIfExists('aar_job_safeties');
    }
}
