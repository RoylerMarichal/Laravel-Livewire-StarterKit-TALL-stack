<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index();
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->bigInteger('order_id')->unsigned()->index();
            $table->foreign('order_id')->references('id')->on('orders')->cascadeOnDelete()->cascadeOnUpdate();
            $table->string('invoice_id', 50)->nullable();
            $table->string('invoice_url', 256)->nullable();
            $table->string('payment_image', 256)->nullable();
            $table->mediumText('details')->nullable();
            $table->float('value', 10, 0)->nullable();
            $table->enum('status', ['paid', 'pending', 'inpaid', 'expired'])->nullable()->default('pending');
            $table->timestamp('due_in')->nullable();
            $table->timestamp('paid_in')->nullable();
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
        Schema::dropIfExists('invoices');
    }
}
