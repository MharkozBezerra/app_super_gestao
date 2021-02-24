<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TesteController extends Controller
{
    public function teste(int $p1,int $p2){

          
            //return view('site.teste',['x'=> $p1, 'y'=> $p2]); -> Array
            //Usa-se as  variável como - nome string
            //return view('site.teste',compact('p1','p2')); //Compact

            return view('site.teste')->with('x',$p1)->with('y',$p2);

    }

}
