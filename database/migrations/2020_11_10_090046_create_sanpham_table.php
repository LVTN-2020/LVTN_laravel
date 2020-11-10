<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSanphamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sanpham', function (Blueprint $table) {
            $table->id();
            $table->integer('ma_sp');
            $table->string('ten_sp', 100);
            $table->integer('gia');
            $table->integer('sale');
            $table->string('hinhanh', 100);
            $table->string('mota', 255);
            $table->string('trangthai_sp', 50);
            $table->integer('ma_danhmuc')->unsigned();
            $table->foreign('ma_danhmuc')->references('ma_danhmuc')->on('danhmuc')->onDelete('cascade');
            $table->integer('ma_dongsp')->unsigned();
            $table->foreign('ma_dongsp')->references('ma_dongsp')->on('dongsanpham')->onDelete('cascade');
            $table->integer('ma_ncc')->unsigned();
            $table->foreign('ma_ncc')->references('ma_ncc')->on('nhacungcap')->onDelete('cascade');
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
        Schema::dropIfExists('sanpham');
    }
}
