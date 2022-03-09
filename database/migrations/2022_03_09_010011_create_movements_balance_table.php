<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMovementsBalanceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movements_balance', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('for')->nullable();
            $table->string('via')->nullable();
            $table->string('type')->comment('entrada | salida');
            $table->string('concept');
            $table->string('details', 512)->nullable();
            $table->double('amount');
            $table->double('sub_total')->nullable();
            $table->string('of_type', 50)->nullable()->comment('negocio | repartidor | comercial |cliente');
            $table->bigInteger('of_id')->nullable()->comment('De id');
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
        Schema::dropIfExists('movements_balance');
    }
}
