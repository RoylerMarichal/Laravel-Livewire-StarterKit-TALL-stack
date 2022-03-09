<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('settings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('currency', 50)->default('CUP');
            $table->string('module_stats_system', 50)->default('CUP');
            $table->string('app_name', 50);
            $table->string('logo', 128);
            $table->string('favicon', 128);
            $table->string('campains_open', 128);
            $table->string('register_open', 128);
            $table->string('qvapay', 10)->default('true');
            $table->string('qvapay_app_secret', 256);
            $table->string('qvapay_app_id', 256);
            $table->string('manual', 256);
            $table->string('enzona', 256);
            $table->string('stripe', 256);
            $table->string('stripe_app_key', 256);
            $table->string('stripe_app_secret', 256);
            $table->string('enzona_client_key', 256);
            $table->string('enzona_client_secret', 256);
            $table->string('card_manual', 256);
            $table->string('card_manual_info', 256);
            $table->string('title_one', 256);
            $table->mediumText('subtitle_one');
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
        Schema::dropIfExists('settings');
    }
}
