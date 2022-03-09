<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementsBalancePendingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements_balance_pending', function (Blueprint $table) {
            $table->bigInteger('id', true);
            $table->string('transation_uuid', 50)->default('0');
            $table->string('type', 50)->nullable();
            $table->string('refer', 50)->nullable();
            $table->string('refer_id', 50)->nullable();
            $table->char('url')->nullable();
            $table->string('via', 50)->nullable();
            $table->string('method', 50)->nullable();
            $table->string('details')->nullable();
            $table->string('model', 50)->nullable();
            $table->unsignedBigInteger('model_id')->nullable();
            $table->string('code', 50)->nullable();
            $table->float('amount', 10, 0)->nullable();
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
        Schema::dropIfExists('movements_balance_pending');
    }
}
