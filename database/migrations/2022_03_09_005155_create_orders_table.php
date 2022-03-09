<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('service_id')->unsigned()->nullable()->index();
            $table->foreign('service_id')->references('id')->on('services')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->bigInteger('user_id')->unsigned()->nullable()->index();
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('SET NULL')->onDelete('SET NULL');
            $table->string('name', 256)->nullable();
            $table->string('model', 55)->nullable();
            $table->float('price', 10, 0)->nullable();
            $table->string('client_name', 128)->nullable();
            $table->string('client_email', 55)->nullable();
            $table->string('client_phone', 16)->nullable();
            $table->enum('status', ['pending', 'paid', 'complete'])->nullable()->default('pending');
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
        Schema::dropIfExists('orders');
    }
}
