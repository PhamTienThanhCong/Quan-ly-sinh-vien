<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_hocs', function (Blueprint $table) {
            $table->id();
            $table->string('ma_lop', 15)->nullable(false)->unique();
            // ma ky hoc
            $table->foreignId('ma_ky_hoc')->nullable(false)->constrained('ky_hocs');
            // ma mon hoc
            $table->string('ma_mon_hoc', 15)->nullable(false);
            $table->foreign('ma_mon_hoc')->nullable(false)->references('ma_mon_hoc')->on('mon_hocs');
        
            // ma giang vien
            $table->string('ma_giang_vien', 15)->nullable(false);
            $table->foreign('ma_giang_vien')->nullable(false)->references('ma_giang_vien')->on('giang_viens');
            // start day and end day
            $table->date('ngay_bat_dau')->nullable(false);
            $table->date('ngay_ket_thuc')->nullable(false);
            $table->string('ngay_trong_tuan', 50)->nullable(false);
            $table->integer('so_tiet')->nullable(false);
            $table->time('tiet_bat_dau')->nullable(false);
            $table->string('phong_hoc', 50)->nullable(false);

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
        Schema::dropIfExists('lop_hocs');
    }
}
