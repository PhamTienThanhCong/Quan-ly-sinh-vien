<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKetQuaHocTapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ket_qua_hoc_taps', function (Blueprint $table) {
            $table->id();
            // Mã sinh viên
            $table->string('ma_sinh_vien', 15)->nullable(false);
            $table->foreign('ma_sinh_vien')->references('ma_sinh_vien')->on('sinh_viens');            
            // Mã kì học
            $table->foreignId('ma_ky_hoc')->nullable(false)->constrained('ky_hocs');
            // điểm rèn luyện
            $table->float('diem_ren_luyen')->nullable(true);
            // điểm trung bình tích lũy
            $table->float('diem_trung_binh_tich_luy')->nullable(true);
            // Kết quả học tập
            $table->string('ket_qua_hoc_tap', 20)->nullable(true);
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
        Schema::dropIfExists('ket_qua_hoc_taps');
    }
}
