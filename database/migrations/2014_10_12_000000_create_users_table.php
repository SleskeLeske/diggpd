<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->string('provider')->nullable();
            $table->string('provider_id')->nullable();
            $table->text('firstName');
            $table->text('lastName');
            $table->string('addressline')->nullable();
            $table->integer('postnr')->nullable();
            $table->string('place')->nullable();
            $table->string('phone')->nullable();
            $table->boolean('confirmed')->default(0);
            $table->string('confirmation_code')->nullable();
            $table->tinyInteger('admin')->nullable()->default(0);
            $table->tinyInteger('client')->nullable()->default(0);
            $table->tinyInteger('driver')->nullable()->default(0);
            $table->integer('credits')->nullable()->default(0);
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
