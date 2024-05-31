<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pemakaian extends Model
{
    use HasFactory;

    protected $table = "pemakaian";

    protected $fillable = [
        "kode_barang",
        "jumlah",
        "tanggal",
        "ruang",
        "keterangan"
    ];

    public function barang(): BelongsTo
    {
        return $this->belongsTo(Barang::class, "kode_barang", "kode");
    }
}
