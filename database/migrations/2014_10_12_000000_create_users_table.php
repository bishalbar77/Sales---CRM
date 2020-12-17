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
            $table->bigIncrements('id');
            $table->integer('user');
            $table->string('name');
            $table->string('phone')->unique();
            $table->string('email')->unique();
            $table->string('address');
            $table->string('pincode');
            $table->string('city');
            $table->string('district');
            $table->string('state');
            $table->string('country');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('user_type');
            $table->string('password');
            $table->integer('is_active')->default(1);
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
