<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DivisionCenter extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'division_center'; 
    protected $keyType = 'string';// Pastikan nama tabelnya sesuai

    protected $fillable = [
        'id',
        'nama',   // kolom yang tidak boleh null
        'deskripsi', 
        'status', // kolom yang boleh null
        'created_at',
        'updated_at',
        'deleted_at',
             
    ];
}