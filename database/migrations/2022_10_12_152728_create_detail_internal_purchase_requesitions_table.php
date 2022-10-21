<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDetailInternalPurchaseRequesitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_internal_purchase_requesitions', function (Blueprint $table) {
            $table->id();
            $table->string('quantity');
            $table->string('catalog');
            $table->string('description');
            $table->string('size');
            $table->string('unit_price');
            $table->string('amount');
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
        Schema::dropIfExists('detail_internal_purchase_requesitions');
    }
}
