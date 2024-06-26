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
        Schema::create('kamar_standar', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_kamar', 10)->nullable(false);
            $table->string('jenis_tempat_tidur', 50)->nullable(false);
            $table->integer('kapasitas')->nullable(false);
            $table->integer('ketersediaan')->nullable(false)->default(10);
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
        Schema::dropIfExists('kamar_standar');
    }
};
