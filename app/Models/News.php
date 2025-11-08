<?php

// app/Models/News.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use HasFactory, SoftDeletes;

    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $table = 'news';
    protected $keyType = 'string';
    protected $fillable = [
        'id',
        'title',
        'category_id', // Tambahkan kolom kategori
        'content',
        'image',
        'views',
        'file_upload',
        'created_at',
        'updated_at',
        'deleted_at'
    ];

    // Relasi dengan kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }
}
