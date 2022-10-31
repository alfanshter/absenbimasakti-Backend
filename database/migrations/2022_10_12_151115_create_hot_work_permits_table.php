<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotWorkPermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hot_work_permits', function (Blueprint $table) {
            $table->id();
            $table->text('ref_id');
            $table->string('job');
            $table->string('attached_ptw_no');
            $table->string('brief_description');
            $table->string('contractor');
            $table->string('location');
            $table->text('id_equipment_check')->nullable();
            $table->enum('fire_exs', ['yes', 'no']);
            $table->enum('welding', ['yes', 'no']);
            $table->enum('wacc_flammable', ['yes', 'no']);
            $table->enum('wacc_combustible', ['yes', 'no']);
            $table->enum('cpp_problem_health', ['yes', 'no']);
            $table->enum('cpp_adequote', ['yes', 'no']);
            $table->enum('cpp_understand_site', ['yes', 'no']);
            $table->enum('cpp_kextinguidsher', ['yes', 'no']);
            $table->string('other_precaution');
            $table->datetime('vp_form');
            $table->datetime('vp_to');
            $table->string('issuer');
            $table->datetime('vp_datetime');
            $table->string('c_acceptor');
            $table->datetime('c_datetime');
            $table->string('stop_working');
            $table->string('stoped_by');
            $table->string('h_acceptor');
            $table->datetime('h_acceptor_datetime');
            $table->string('h_issuer');
            $table->datetime('h_issuer_datetime');
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
        Schema::dropIfExists('hot_work_permits');
    }
}
