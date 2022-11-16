<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username');
            $table->string('email')->unique();
            $table->string('status');
            $table->unsignedBigInteger('grup_id')->nullable();
            $table->foreign('grup_id')
                ->references('id')
                ->on('groupusers')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamp('email_verified_at')->nullable();
            $table->enum('role', ['0','1','2']);
            $table->string('token_id')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
