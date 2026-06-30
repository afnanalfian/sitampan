<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubUnitOrganisasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_organisasi_id',
        'nama_sub_unit_organisasi',
    ];

    // ========== RELASI ==========

    /**
     * Relasi ke Unit Organisasi
     */
    public function unitOrganisasi()
    {
        return $this->belongsTo(UnitOrganisasi::class);
    }

    /**
     * Relasi ke Tanah
     */
    public function tanahs()
    {
        return $this->hasMany(Tanah::class);
    }
}