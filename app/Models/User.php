<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'nip_nipppk',
        'jabatan',
        'unit_organisasi_id',
        'status',
        'nomor_telepon',
        'foto',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // ========== RELASI ==========
    
    /**
     * Relasi ke Unit Organisasi
     */
    public function unitOrganisasi()
    {
        return $this->belongsTo(UnitOrganisasi::class);
    }

    /**
     * Relasi ke Tanah (sebagai pengurus barang)
     */
    public function tanahPengurus()
    {
        return $this->hasMany(Tanah::class, 'pengurus_barang_id');
    }

    // ========== ACCESSOR ==========
    
    /**
     * Get full name with NIP
     */
    public function getNamaLengkapAttribute()
    {
        return $this->name . ' (' . $this->nip_nipppk . ')';
    }

    /**
     * Get status badge
     */
    public function getStatusBadgeAttribute()
    {
        return match($this->status) {
            'PNS' => '<span class="badge bg-primary">PNS</span>',
            'PPPK' => '<span class="badge bg-success">PPPK</span>',
            default => '<span class="badge bg-secondary">' . $this->status . '</span>',
        };
    }
}