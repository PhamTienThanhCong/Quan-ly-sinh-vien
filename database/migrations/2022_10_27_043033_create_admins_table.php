<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->string('email', 100)->nullable(false)->unique();
            $table->string('username', 50)->nullable(false)->unique();
            $table->string('password', 255)->nullable(false);
            // foreign key to khoas table
            $table->string('ma_khoa', 15)->nullable(false);
            $table->foreign('ma_khoa')->references('ma_khoa')->on('khoas');
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
        Schema::dropIfExists('admins');
    }
}
