<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOvertimeWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('overtime_works', function (Blueprint $table) {
            $table->id();
            $table->string('ref_id');
            $table->string('nik');
            $table->string('name');
            $table->string('department');
            $table->string('position');
            $table->string('complete');
            $table->date('o_date');
            $table->date('o_start_date');
            $table->date('o_start_date_to');
            $table->string('o_reason');
            $table->string('user_created');
            $table->string('status');
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
        Schema::dropIfExists('overtime_works');
    }
}
