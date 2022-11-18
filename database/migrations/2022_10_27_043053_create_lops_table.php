<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lops', function (Blueprint $table) {
            $table->string('ma_lop', 15)->nullable(false)->unique()->primary();
            $table->string('ten_lop', 100)->nullable(false);
            // ma khoa
            $table->string('ma_khoa', 15)->nullable(false);
            $table->foreign('ma_khoa')->references('ma_khoa')->on('khoas');
            // ma chuyen nganh
            $table->string('ma_chuyen_nganh', 15)->nullable(false);
            $table->foreign('ma_chuyen_nganh')->references('ma_chuyen_nganh')->on('chuyen_nganhs');
            // ma giang vien
            $table->string('ma_giang_vien', 15)->nullable(false);
            $table->foreign('ma_giang_vien')->references('ma_giang_vien')->on('giang_viens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lops');
    }
}
