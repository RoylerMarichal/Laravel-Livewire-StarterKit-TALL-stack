<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MakeColumnsNullableOnSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('logo', 128)->nullable()->change();
            $table->string('favicon', 128)->nullable()->change();
            $table->string('campains_open', 128)->nullable()->change();
            $table->string('register_open', 128)->nullable()->change();
            $table->string('qvapay_app_secret', 256)->nullable()->change();
            $table->string('qvapay_app_id', 256)->nullable()->change();
            $table->string('manual', 256)->nullable()->change();
            $table->string('enzona', 256)->nullable()->change();
            $table->string('stripe', 256)->nullable()->change();
            $table->string('stripe_app_key', 256)->nullable()->change();
            $table->string('stripe_app_secret', 256)->nullable()->change();
            $table->string('enzona_client_key', 256)->nullable()->change();
            $table->string('enzona_client_secret', 256)->nullable()->change();
            $table->string('card_manual', 256)->nullable()->change();
            $table->string('card_manual_info', 256)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('settings', function (Blueprint $table) {
            $table->string('logo', 128)->nullable(false)->change();
            $table->string('favicon', 128)->nullable(false)->change();
            $table->string('campains_open', 128)->nullable(false)->change();
            $table->string('register_open', 128)->nullable(false)->change();
            $table->string('qvapay_app_secret', 256)->nullable(false)->change();
            $table->string('qvapay_app_id', 256)->nullable(false)->change();
            $table->string('manual', 256)->nullable(false)->change();
            $table->string('enzona', 256)->nullable(false)->change();
            $table->string('stripe', 256)->nullable(false)->change();
            $table->string('stripe_app_key', 256)->nullable(false)->change();
            $table->string('stripe_app_secret', 256)->nullable(false)->change();
            $table->string('enzona_client_key', 256)->nullable(false)->change();
            $table->string('enzona_client_secret', 256)->nullable(false)->change();
            $table->string('card_manual', 256)->nullable(false)->change();
            $table->string('card_manual_info', 256)->nullable(false)->change();
        });
    }
}
