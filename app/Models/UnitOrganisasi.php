<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UnitOrganisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'bidang_id',
        'nama_unit_organisasi',
    ];

    // ========== RELASI ==========

    /**
     * Relasi ke Bidang
     */
    public function bidang()
    {
        return $this->belongsTo(Bidang::class);
    }

    /**
     * Relasi ke Sub Unit Organisasi
     */
    public function subUnitOrganisasis()
    {
        return $this->hasMany(SubUnitOrganisasi::class);
    }

    /**
     * Relasi ke Tanah
     */
    public function tanahs()
    {
        return $this->hasMany(Tanah::class);
    }

    /**
     * Relasi ke User
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }

    // ========== ACCESSOR ==========

    /**
     * Get complete name with bidang
     */
    public function getNamaLengkapAttribute()
    {
        return $this->nama_unit_organisasi . ' (' . $this->bidang->nama_bidang . ')';
    }
}