<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\RoleUser; // ✅ WAJIB ditambahkan
use App\Models\Role;     // ✅ kalau belum ada, tambahkan juga

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $primaryKey = 'iduser';

    protected $fillable = [
        'nama',      // ✅ ubah dari 'name' ke 'nama' sesuai kolom database
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

    // 🔹 Relasi ke tabel role_user
    public function roleUser()
    {
        return $this->hasMany(RoleUser::class, 'iduser', 'iduser');
    }

    // 🔹 Relasi langsung ke tabel role (many-to-many)
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_user', 'iduser', 'idrole');
    }

     public function pemilik()
    {
        return $this->hasOne(Pemilik::class, 'iduser', 'iduser');
    }
    
}

