<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TemuDokter extends Model
{
    protected $table = 'temu_dokter';
    protected $primaryKey = 'idreservasi_dokter';
    public $timestamps = false;

    protected $fillable = [
        'no_urut',
        'waktu_daftar',
        'status',
        'keluhan',
        'idpet',
        'idrole_user'
    ];

    // Relasi ke Pet
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'idpet', 'idpet');
    }

    // Relasi ke RoleUser (Dokter)
    public function roleUser()
    {
        return $this->belongsTo(RoleUser::class, 'idrole_user', 'idrole_user');
    }

    // Relasi ke RekamMedis
    public function rekamMedis()
    {
        return $this->hasOne(RekamMedis::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }

    // Status label
    public function getStatusLabelAttribute()
    {
        switch($this->status) {
            case 'W': return 'Menunggu';
            case 'P': return 'Dalam Proses';
            case 'S': return 'Selesai';
            case 'B': return 'Batal';
            default: return 'Unknown';
        }
    }

    // Status badge class
    public function getStatusBadgeAttribute()
    {
        switch($this->status) {
            case 'W': return 'badge-warning';
            case 'P': return 'badge-info';
            case 'S': return 'badge-success';
            case 'B': return 'badge-danger';
            default: return 'badge-secondary';
        }
    }
}
