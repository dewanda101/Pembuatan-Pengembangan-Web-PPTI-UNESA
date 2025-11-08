<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserManual extends Model
{
    // Tidak perlu timestamps
    public $timestamps = false;

    // Isi data secara manual atau dari database
    public static function getAll()
    {
        return [
            [
                'id' => 1,
                'category' => 'Panduan Aplikasi',
                'url' => 'https://example.com/app-guide',
                'link' => 'https://example.com/files/app-guide.pdf',
            ],
            [
                'id' => 2,
                'category' => 'Manual Pengguna',
                'url' => 'https://example.com/user-manual',
                'link' => 'https://example.com/files/user-manual.pdf',
            ],
        ];
    }
}
