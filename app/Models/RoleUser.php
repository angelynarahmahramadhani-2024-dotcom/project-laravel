<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
    use HasFactory;

    protected $table = 'role_user';
    protected $primaryKey = 'idrole_user';
    public $timestamps = false;

    protected $fillable = ['iduser', 'idrole', 'status'];

    // Relasi ke tabel role
    public function role()
    {
        // tambahkan parameter ketiga 'idrole' biar eksplisit
        return $this->belongsTo(Role::class, 'idrole', 'idrole');
    }

    // Relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class, 'iduser', 'iduser');
    }
}
