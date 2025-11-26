<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RekamMedis extends Model
{
    protected $table = 'rekam_medis';
    protected $primaryKey = 'idrekam_medis';
    public $timestamps = false;

    protected $fillable = [
        'idreservasi_dokter',
        'created_at',
        'anamnesa',
        'temuan_klinis',
        'diagnosa',
        'dokter_pemeriksa'
    ];

    protected $casts = [
        'created_at' => 'datetime',
    ];

    // Relasi ke TemuDokter (Reservasi)
    public function temuDokter()
    {
        return $this->belongsTo(TemuDokter::class, 'idreservasi_dokter', 'idreservasi_dokter');
    }

    // Relasi ke User (Dokter Pemeriksa)
    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_pemeriksa', 'iduser');
    }

    // Relasi ke DetailRekamMedis
    public function detailRekamMedis()
    {
        return $this->hasMany(DetailRekamMedis::class, 'idrekam_medis', 'idrekam_medis');
    }
}
