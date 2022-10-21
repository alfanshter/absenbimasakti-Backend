<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternalPurchaseRequesitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('internal_purchase_requesitions', function (Blueprint $table) {
            $table->id();
            $table->string('ref_id');
            $table->string('requestioned_by');
            $table->date('date');
            $table->string('department');
            $table->string('position');
            $table->string('project_location');
            $table->string('completed_addres');
            $table->text('id_detail');
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
        Schema::dropIfExists('internal_purchase_requesitions');
    }
}
