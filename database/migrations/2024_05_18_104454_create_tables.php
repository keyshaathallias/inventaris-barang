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
        Schema::create("barang", function (Blueprint $table) {
            $table->string("kode")->primary();
            $table->string("nama")->unique();
            $table->string("jenis");
            $table->unsignedInteger("jumlah");
            $table->integer("harga");
            $table->timestamps();
        });
        Schema::create("pembelian", function (Blueprint $table) {
            $table->id();
            $table->string("kode_barang");
            $table->string("merk");
            $table->unsignedInteger("jumlah");
            $table->timestamps();
            $table->foreign("kode_barang")->references("kode")->on("barang");
        });
        Schema::create("pemakaian", function (Blueprint $table) {
            $table->id();
            $table->string("kode_barang");
            $table->unsignedInteger("jumlah");
            $table->date("tanggal");
            $table->string("ruang");
            $table->string("keterangan");
            $table->timestamps();
            $table->foreign("kode_barang")->references("kode")->on("barang");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("pemakaian");
        Schema::dropIfExists("pembelian");
        Schema::dropIfExists("barang");
    }
};
