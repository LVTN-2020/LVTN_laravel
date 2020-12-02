<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChitietDhColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chitiet_dh', function (Blueprint $table) {
            $table->integer('size');
            $table->string('mau', 100);
            $table->integer('tongtien');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chitiet_dh', function (Blueprint $table) {
            //
        });
    }
}
