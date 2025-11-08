<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Manualbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'kategori_dokumen',
        'url_sistem_informasi',
        'link_sistem_informasi',
    ];
}
