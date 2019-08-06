<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class asignatura extends Model
{
	protected $table = 'asignatura';
    public $timestamps= false;
    protected $fillable = [
        'descripcion',
    ];
}
