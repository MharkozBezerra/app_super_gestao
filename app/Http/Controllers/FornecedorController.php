<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
  
    public function index(){
        $fornecedores = ['Fornecedor 1'];

        return view('app.fornecedor.index')->with('fornecedores',$fornecedores);
    }
    public function listar(Request $request){

        

        //Retorna uma collection
        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('name').'%')
        ->where('site', 'like', '%'.$request->input('site').'%')
        ->where('uf', 'like', '%'.$request->input('uf').'%')
        ->where('email', 'like', '%'.$request->input('email').'%')
        ->get();

        
        return view('app.fornecedor.listar',['fornecedores'=>$fornecedores]);
    }
    public function adicionar(Request $request){
        $msg = "";
        //Verifica se o token não está vazio
        if($request->input('_token') !=''){
            $regras =[
                'nome'=> 'required|min:3 |max:40',
                'site'=> 'required',
                'uf'=> 'required |min:2 |max:2',
                'email'=> 'email'
                
            ];
            $feedback =[
                'required' => '* O campos :attribute é obrigatórios',
                'nome.min' => 'Você precisa de pelo menos 3 caracteres nesse campo',
                'nome.max' => 'Você poderá digitar até 40 caracteres nesse campo',
                'uf.min' => 'Você precisa de pelo menos 2 caracteres nesse campo',
                'uf.max' => 'Você poderá informar até 2 caracteres nesse campo',
                'email.email' => 'E-mail informador não é válido'
            ];
            //Verifica se as informação estão válidas.
            $request->validate($regras,$feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            //redireciona para uma página de sucesso.

            //dados de acesso.
            $msg = "Cadastro realizado com sucesso!";

        }
        return view('app.fornecedor.adicionar',['msg'=>$msg]);
    }
    public function editar($id){

        $msg = "";

        $fornecedor = Fornecedor::find($id);
        return view('app.fornecedor.adicionar',['fornecedor'=>$fornecedor]);

    }
}
