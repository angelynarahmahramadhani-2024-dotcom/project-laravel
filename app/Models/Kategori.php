<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';
    protected $primaryKey = 'idkategori';
    public $timestamps = false;
    public $incrementing = false; // karena bukan AUTO_INCREMENT
    protected $fillable = ['idkategori', 'nama_kategori'];
}
