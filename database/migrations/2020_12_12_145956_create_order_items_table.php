<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create
        (
            'order_items', 
            function (Blueprint $table) 
            {
                $table->increments('id');
                $table->integer('order_id');
                $table->integer('item_id');
                $table->integer('size_id');
                $table->integer('door_type_id');
                $table->string('qty');
                $table->string('design_number');
                $table->string('color');
                $table->string('remark');
                $table->string('status');
                $table->string('added_on')->nullable();
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
