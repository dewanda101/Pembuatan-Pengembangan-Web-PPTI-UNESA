<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Uuid
{
    // Fungsi boot untuk meng-generate UUID sebelum model dibuat
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->{$model->getKeyName()})) {
                $model->{$model->getKeyName()} = (string) Str::uuid();
            }
        });
    }

    // Menandakan bahwa ID tidak auto increment
    public function getIncrementing()
    {
        return false;
    }

    // Menandakan bahwa tipe kunci adalah string
    public function getKeyType()
    {
        return 'string';
    }
}
