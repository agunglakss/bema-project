<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricelistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricelists', function (Blueprint $table) {
            $table->id();
            $table->foreignId('motor_id');
            $table->integer('uang_muka');
            $table->integer('diskon');
            $table->integer('bulan_11');
            $table->integer('bulan_17');
            $table->integer('bulan_23');
            $table->integer('bulan_27');
            $table->integer('bulan_29');
            $table->integer('bulan_33');
            $table->integer('bulan_35');
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
        Schema::dropIfExists('pricelists');
    }
}
