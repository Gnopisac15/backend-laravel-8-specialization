<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->BigInteger('user_post_id');
            $table->unsignedBigInteger('user_id');
          
            $table->string('fname');
            $table->string('address');
            $table->string('contact');
            $table->BigInteger('price');
            $table->BigInteger('qty');
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
        Schema::dropIfExists('order');
    }
}
