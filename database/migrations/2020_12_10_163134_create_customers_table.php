<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
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
            $table->string('gst');
            $table->string('gst_type');
            $table->integer('is_active')->default(1);
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
        Schema::dropIfExists('customers');
    }
}
