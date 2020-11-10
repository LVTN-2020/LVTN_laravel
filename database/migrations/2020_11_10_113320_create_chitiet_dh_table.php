<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietDhTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiet_dh', function (Blueprint $table) {
            $table->increments('ma_chitiet');
            $table->string('ten_sp');
            $table->integer('so_tien');
            $table->integer('soluong');
            $table->integer('donhang_id')->unsigned();
            $table->foreign('donhang_id')->references('donhang_id')->on('donhang')->onDelete('cascade');
            $table->integer('ma_sp')->unsigned();
            $table->foreign('ma_sp')->references('ma_sp')->on('sanpham')->onDelete('cascade');
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
        Schema::dropIfExists('chitiet_dh');
    }
}
