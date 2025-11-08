<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'jabatan';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'jabatan'
    ];

    public function team()
    {
        return $this->hasMany(Team::class, 'jabatan_id', 'id');
    }
}
