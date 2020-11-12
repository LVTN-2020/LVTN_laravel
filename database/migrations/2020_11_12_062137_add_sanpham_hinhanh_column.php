<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSanphamHinhanhColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sanpham_hinhanh', function (Blueprint $table) {
            $table->integer('ma_sp')->unsigned();
            $table->foreign('ma_sp')->references('ma_sp')->on('sanpham')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sanpham_hinhanh', function (Blueprint $table) {
            //
        });
    }
}
