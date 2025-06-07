<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Desktop extends Model
{

    // 👉 Define el nombre real de la tabla
    protected $table = 'desktop';

    protected $fillable = [
       'nombre', 'descripcion'
    ];


}

