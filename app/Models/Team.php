<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Team extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'teams';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'nama',
        'jabatan_id', 
        'deskripsi',
        'images',
        'status',
        'created_at',
        'updated_at',
        'deleted_at'
    ];
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id', 'id');
    }
   
}
