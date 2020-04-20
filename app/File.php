<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    protected $fillable = [
        'ln_nombre', 'ln_tipo', 'ln_extension','id_nu_user'
    ];

    //=====usuario tiene un archivo
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
