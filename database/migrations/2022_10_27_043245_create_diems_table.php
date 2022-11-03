<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diems', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ma_dang_ki_hoc')->nullable(false)->constrained('dang_ki_hocs');
            // create ma sinh vien
            $table->string('ma_sinh_vien', 15)->nullable(false);
            $table->foreign('ma_sinh_vien')->references('ma_sinh_vien')->on('sinh_viens');

            $table->float('diem_chuyen_can')->nullable(true);
            $table->float('diem_giua_ki')->nullable(true);
            $table->float('diem_lan_cuoi_ki')->nullable(true);
            $table->float('diem_tong_ket')->nullable(true);
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
        Schema::dropIfExists('diems');
    }
}
