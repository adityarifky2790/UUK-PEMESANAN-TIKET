<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('tiket', function (Blueprint $table) {
        $table->id();
        $table->string('kode_tiket')->unique();
        $table->string('nama_event');
        $table->string('kategori');
        $table->string('lokasi');
        $table->date('tanggal_event');
        $table->decimal('harga', 12, 2);
        $table->integer('stok');
        $table->text('deskripsi')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tiket');
    }
};
