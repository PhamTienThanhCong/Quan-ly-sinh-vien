<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiangViensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giang_viens', function (Blueprint $table) {
            $table->string('ma_giang_vien', 15)->nullable(false)->unique()->primary();
            $table->string('ho_ten', 100)->nullable(false);
            $table->string('email', 100)->nullable(false)->unique();
            $table->string('so_dien_thoai', 15)->nullable(true);
            $table->string('dia_chi', 255)->nullable(true);
            $table->string('avatar', 255)->nullable(true);
            // ma khoa
            $table->string('ma_khoa', 15)->nullable(false);
            $table->foreign('ma_khoa')->nullable(true)->references('ma_khoa')->on('khoas');
            $table->string('hoc_van', 255)->nullable(true);
            $table->string('chuyen_mon', 255)->nullable(true);
            $table->text('ghi_chu')->nullable(true);
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
        Schema::dropIfExists('giang_viens');
    }
}
