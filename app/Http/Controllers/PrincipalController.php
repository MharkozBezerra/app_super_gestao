<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\MotivoContato;

class PrincipalController extends Controller
{
    //Acessa a view que está na pasta resource / view / site / principal.blade.php
    public function principal(){

        //Setada os dados do banco de dados.
        $motivo_contatos = MotivoContato::all();
        return view('site.principal',['motivo_contatos'=>$motivo_contatos]);
    }
}
