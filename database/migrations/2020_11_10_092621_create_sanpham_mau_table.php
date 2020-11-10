<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamMauTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham_mau', function (Blueprint $table) {
            $table->increments('ma_hinhanh');
            $table->string('mau', 100);
            $table->string('trangthai_mau', 50);
            $table->integer('ma_sp')->unsigned();
            $table->foreign('ma_sp')->references('id')->on('sanpham')->onDelete('cascade');
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
        Schema::dropIfExists('sanpham_mau');
    }
}
