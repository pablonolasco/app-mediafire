<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    //
    protected $fillable = [
        'ln_nombre', 'ln_tipo', 'ln_extension',
    ];

    //=====usuario tiene un archivo
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
