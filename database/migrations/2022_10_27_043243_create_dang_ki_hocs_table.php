<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDangKiHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dang_ki_hocs', function (Blueprint $table) {
            $table->id();
            // Mã lớp học
            $table->foreignId('ma_lop_hoc')->nullable(false)->constrained('lop_hocs');
            // Mã sinh viên
            $table->string('ma_sinh_vien', 15)->nullable(false);
            // alert table 
            $table->foreign('ma_sinh_vien')->references('ma_sinh_vien')->on('sinh_viens');
            // can delete
            $table->boolean('can_delete')->nullable(false)->default(true);
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
        Schema::dropIfExists('dang_ki_hocs');
    }
}
