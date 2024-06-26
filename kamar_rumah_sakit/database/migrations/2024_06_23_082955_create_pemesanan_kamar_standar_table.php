<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemesanan_kamar_standar', function (Blueprint $table) {
            $table->id();
            $table->string('nama', 50)->nullable(false);
            $table->unsignedBigInteger('id_kamar')->nullable(false);
            $table->foreign('id_kamar')->references('id')->on('kamar_standar');
            $table->date('tanggal_checkin')->nullable(false)->default(now()->toDateString());
            $table->dateTime('tanggal_checkout')->nullable();
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
        Schema::dropIfExists('pemesanan_kamar_standar');
    }
};
