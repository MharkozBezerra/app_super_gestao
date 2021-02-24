<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{

   public function __construct()
   {
     $this->middleware('log.acesso');
   }
    //Acessa a view que está na pasta resource / view / site / sobre-nos.blade.php
   public function sobreNos(){
      return view('site.sobre-nos');
   }
}
