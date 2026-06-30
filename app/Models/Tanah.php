<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tanah extends Model
{
    use HasFactory;

    protected $table = 'tanahs';

    protected $fillable = [
        'bidang_id',
        'unit_organisasi_id',
        'sub_unit_organisasi_id',
        'kelurahan_id',
        'hak_id',
        'penggunaan_id',
        'asal_usul_id',
        'pengurus_barang_id',
        'no_kode_wilayah',
        'nama_barang',
        'nomor_kode_barang_1_3',
        'nomor_registrasi',
        'luas',
        'tahun_pengadaan',
        'letak_alamat',
        'tanggal_sertifikat',
        'nomor_sertifikat',
        'harga',
        'latitude',
        'longitude',
        'keterangan',
    ];

    protected $casts = [
        'luas' => 'decimal:2',
        'harga' => 'decimal:2',
        'latitude' => 'decimal:8',
        'longitude' => 'decimal:8',
        'tanggal_sertifikat' => 'date',
        'tahun_pengadaan' => 'integer',
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
     * Relasi ke Unit Organisasi
     */
    public function unitOrganisasi()
    {
        return $this->belongsTo(UnitOrganisasi::class);
    }

    /**
     * Relasi ke Sub Unit Organisasi
     */
    public function subUnitOrganisasi()
    {
        return $this->belongsTo(SubUnitOrganisasi::class);
    }

    /**
     * Relasi ke Kelurahan
     */
    public function kelurahan()
    {
        return $this->belongsTo(Kelurahan::class);
    }

    /**
     * Relasi ke Hak
     */
    public function hak()
    {
        return $this->belongsTo(Hak::class);
    }

    /**
     * Relasi ke Penggunaan
     */
    public function penggunaan()
    {
        return $this->belongsTo(Penggunaan::class);
    }

    /**
     * Relasi ke Asal Usul
     */
    public function asalUsul()
    {
        return $this->belongsTo(AsalUsul::class);
    }

    /**
     * Relasi ke User (Pengurus Barang)
     */
    public function pengurusBarang()
    {
        return $this->belongsTo(User::class, 'pengurus_barang_id');
    }

    // ========== ACCESSOR ==========

    /**
     * Get koordinat sebagai array
     */
    public function getKoordinatAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return [
                'lat' => (float) $this->latitude,
                'lng' => (float) $this->longitude
            ];
        }
        return null;
    }

    /**
     * Get koordinat sebagai string
     */
    public function getKoordinatStringAttribute()
    {
        if ($this->latitude && $this->longitude) {
            return $this->latitude . ', ' . $this->longitude;
        }
        return '-';
    }

    /**
     * Get formatted harga (Rupiah)
     */
    public function getHargaFormattedAttribute()
    {
        return 'Rp ' . number_format($this->harga, 0, ',', '.');
    }

    /**
     * Get formatted luas
     */
    public function getLuasFormattedAttribute()
    {
        return number_format($this->luas, 2, ',', '.') . ' m²';
    }

    /**
     * Get status sertifikat
     */
    public function getStatusSertifikatAttribute()
    {
        $tanggal = $this->tanggal_sertifikat;
        $umur = $tanggal->diffInYears(now());
        
        if ($umur <= 5) {
            return '<span class="badge bg-success">Baru</span>';
        } elseif ($umur <= 15) {
            return '<span class="badge bg-warning">Sedang</span>';
        } else {
            return '<span class="badge bg-danger">Lama</span>';
        }
    }

    // ========== SCOPES ==========

    /**
     * Scope filter by nomor sertifikat
     */
    public function scopeBySertifikat($query, $nomor)
    {
        return $query->where('nomor_sertifikat', 'LIKE', "%{$nomor}%");
    }

    /**
     * Scope filter by tahun pengadaan
     */
    public function scopeByTahun($query, $tahun)
    {
        return $query->where('tahun_pengadaan', $tahun);
    }

    /**
     * Scope filter by bidang
     */
    public function scopeByBidang($query, $bidangId)
    {
        return $query->where('bidang_id', $bidangId);
    }

    /**
     * Scope cari tanah dalam radius tertentu (km)
     */
    public function scopeInRadius($query, $lat, $lng, $radius = 5)
    {
        // Haversine formula
        return $query->whereRaw(
            "(6371 * acos(cos(radians(?)) * cos(radians(latitude)) * cos(radians(longitude) - radians(?)) + sin(radians(?)) * sin(radians(latitude)))) <= ?",
            [$lat, $lng, $lat, $radius]
        );
    }

    // ========== METHODS ==========

    /**
     * Check if tanah has coordinate
     */
    public function hasKoordinat()
    {
        return $this->latitude !== null && $this->longitude !== null;
    }

    /**
     * Get URL untuk link ke Sentuh Tanahku
     */
    public function getSentuhTanahkuUrl()
    {
        // Format URL untuk Sentuh Tanahku (contoh)
        // Ini perlu disesuaikan dengan format URL yang sebenarnya
        return "https://sentuhtanahku.atrbpn.go.id/cari?nomor=" . urlencode($this->nomor_sertifikat);
    }
}