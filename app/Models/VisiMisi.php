<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VisiMisi extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'visi_misi'; // Sesuaikan dengan nama tabel Anda
    protected $primaryKey = 'id'; // Karena id bukan integer, definisikan primary key
    public $incrementing = false; // Non-incrementing jika id bukan angka

    protected $keyType = 'string'; // Karena id berupa varchar

    protected $fillable = ['id', 'nama', 'deskripsi'];
}