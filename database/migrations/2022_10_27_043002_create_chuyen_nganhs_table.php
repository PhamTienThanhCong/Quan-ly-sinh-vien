<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChuyenNganhsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chuyen_nganhs', function (Blueprint $table) {
            $table->string('ma_chuyen_nganh', 15)->nullable(false)->primary();
            // alert table ma_khoa to khoas table
            $table->string('ma_khoa', 15)->nullable(false);
            $table->foreign('ma_khoa')->references('ma_khoa')->on('khoas');
            $table->string('ten_chuyen_nganh', 100)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chuyen_nganhs');
    }
}
