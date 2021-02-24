<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MotivoContato extends Model
{
    //Determina criação em massa dos atributos
    protected $fillable=['motivo_contato'];
}
