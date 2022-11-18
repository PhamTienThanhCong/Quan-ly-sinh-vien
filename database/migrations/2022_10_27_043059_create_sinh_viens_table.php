<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSinhViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sinh_viens', function (Blueprint $table) {
            $table->string('ma_sinh_vien', 15)->nullable(false)->unique();
            $table->string('ho_ten', 100)->nullable(false);
            $table->string('email', 100)->nullable(false)->unique();
            $table->string('so_dien_thoai', 15)->nullable(true);
            $table->string('password', 255)->nullable(false);
            $table->string('dia_chi', 255)->nullable(true);
            $table->string('avatar', 255)->nullable(true);
            // create ma khoa
            $table->string('ma_khoa', 15)->nullable(false);
            $table->foreign('ma_khoa')->references('ma_khoa')->on('khoas');
            // create ma chuyen nganh
            $table->string('ma_chuyen_nganh', 15)->nullable(false);
            $table->foreign('ma_chuyen_nganh')->references('ma_chuyen_nganh')->on('chuyen_nganhs');
            // create ma mon lop
            $table->string('ma_lop', 15)->nullable(false);
            $table->foreign('ma_lop')->nullable(false)->references('ma_lop')->on('lops');
            $table->string('remember_token', 100)->nullable(true);
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
        Schema::dropIfExists('sinh_viens');
    }
}
