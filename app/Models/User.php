<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\RoleUser;
use App\Models\Role;
use App\Models\Pemilik;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'iduser';

    // ⛔ WAJIB! karena tabel user kamu tidak punya created_at dan updated_at
    public $timestamps = false;

    protected $fillable = [
        'nama',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relasi roleUser
    public function roleUser()
    {
        return $this->hasMany(RoleUser::class, 'iduser', 'iduser');
    }

    // (opsional) tapi struktur ini sepertinya salah, sebaiknya hapus, tapi tidak wajib
    public function role()
    {
        return $this->belongsTo(Role::class, 'idrole', 'idrole');
    }

    public function pemilik()
    {
        return $this->hasOne(Pemilik::class, 'iduser', 'iduser');
    }

    // Relasi ke Dokter
    public function dokter()
    {
        return $this->hasOne(Dokter::class, 'id_user', 'iduser');
    }

    // Relasi ke Perawat
    public function perawat()
    {
        return $this->hasOne(Perawat::class, 'id_user', 'iduser');
    }
}