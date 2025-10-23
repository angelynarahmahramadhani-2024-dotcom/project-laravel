<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\JenisHewan;

class JenisHewan extends Model
{
    use HasFactory;

    protected $table = 'jenis_hewan';
    protected $primaryKey = 'idjenis_hewan';
    protected $fillable = ['nama_jenis_hewan'];

    public function rasHewan()
    {
        return $this->hasMany(RasHewan::class, 'idjenis_hewan', 'idjenis_hewan');
    }
}
