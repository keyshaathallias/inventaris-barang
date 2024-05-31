<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pembelian extends Model
{
    use HasFactory;

    protected $table = "pembelian";

    protected $fillable = [
        "kode_barang",
        "merk",
        "jumlah",
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, "kode_barang", "kode");
    }

    public function total(): float
    {
        return $this->jumlah * ($this->barang->harga ?? 0);
    }
}
