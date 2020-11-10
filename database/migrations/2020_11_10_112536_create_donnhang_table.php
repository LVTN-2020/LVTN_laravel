<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonnhangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('donhang');
        Schema::create('donhang', function (Blueprint $table) {
            $table->increments('donhang_id');
            $table->string('ma_dh',20);
            $table->date('ngaydathang');
            $table->string('ten_kh',100);
            $table->integer('ma_tt');
            $table->integer('ma_vanchuyen');
            $table->integer('phivanchuyen');
            $table->integer('tongtien');
            $table->string('sdt',20);
            $table->string('diachi',100);
            $table->string('trangthai_dh',50);
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('donhang');
    }
}
