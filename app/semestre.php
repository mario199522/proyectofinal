<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class semestre extends Model
{
	protected $table = 'semestre';
    public $timestamps= false;
    protected $fillable = [
        'descripcion','asignaturaid',
    ];
}
