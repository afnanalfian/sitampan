<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penggunaan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_penggunaan',
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