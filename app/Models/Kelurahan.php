<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Kelurahan extends Model
{
    use HasFactory;

    protected $fillable = [
        'kecamatan_id',
        'nama_kelurahan',
        'kode_kelurahan',
    ];

    // ========== RELASI ==========

    /**
     * Relasi ke Kecamatan
     */
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }

    /**
     * Relasi ke Tanah
     */
    public function tanahs()
    {
        return $this->hasMany(Tanah::class);
    }

    // ========== ACCESSOR ==========

    /**
     * Get complete name with kecamatan
     */
    public function getNamaLengkapAttribute()
    {
        return $this->nama_kelurahan . ', ' . $this->kecamatan->nama_kecamatan;
    }
}