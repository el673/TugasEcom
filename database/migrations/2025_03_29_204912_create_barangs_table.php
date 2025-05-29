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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk');
            $table->integer('jumlah_produk');
            $table->decimal('harga_produk', 10, 2);
            $table->foreignId('id_tipe')->constrained('tipes')->onDelete('cascade');
            $table->integer('stok')->default(0);
            $table->string('asal_daerah')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
