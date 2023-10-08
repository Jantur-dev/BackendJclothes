<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pesanan_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('barang_id');
            $table->unsignedBigInteger('pesanan_id');
            $table->integer('jumlah');
            $table->string('ukuran');
            $table->integer('jumlah_harga');
            $table->timestamps();

            $table->foreign('barang_id')->references('id')->on('barangs')->onDelete('restrict');
            $table->foreign('pesanan_id')->references('id')->on('pesanans')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanan_details');
    }
};
