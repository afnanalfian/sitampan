<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hak extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_hak',
    ];

    // ========== RELASI ==========

    /**
     * Relasi ke Tanah
     */
    public function tanahs()
    {
        return $this->hasMany(Tanah::class);
    }
}