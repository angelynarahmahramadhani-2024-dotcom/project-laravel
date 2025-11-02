<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'idrole';
    public $timestamps = false;

    protected $fillable = ['nama_role', 'deskripsi'];

    public function user ()
    {
        return $this->belongsToMany(User::class, 'role_user', 'idrole', 'iduser');
    }
}
