<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kecamatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_kecamatan',
        'kode_kecamatan',
    ];

    // ========== RELASI ==========

    /**
     * Relasi ke Kelurahan
     */
    public function kelurahans()
    {
        return $this->hasMany(Kelurahan::class);
    }

    // ========== ACCESSOR ==========

    /**
     * Get complete name with code
     */
    public function getNamaLengkapAttribute()
    {
        return $this->nama_kecamatan . ' (' . $this->kode_kecamatan . ')';
    }
}