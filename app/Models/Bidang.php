<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bidang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bidang',
    ];

    // ========== RELASI ==========

    /**
     * Relasi ke Unit Organisasi
     */
    public function unitOrganisasis()
    {
        return $this->hasMany(UnitOrganisasi::class);
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
     * Get total tanah per bidang
     */
    public function getTotalTanahAttribute()
    {
        return $this->tanahs()->count();
    }

    /**
     * Get total luas tanah per bidang
     */
    public function getTotalLuasAttribute()
    {
        return $this->tanahs()->sum('luas');
    }
}