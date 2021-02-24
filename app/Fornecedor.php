<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    
    use SoftDeletes;
    //Define a tabela do banco de dados.
    protected $table = 'fornecedores';
    protected $fillable = ['nome','site','uf','email'];

    


      
}
