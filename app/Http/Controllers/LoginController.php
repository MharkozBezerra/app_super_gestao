<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index(Request $request){
        //Recupera o valor recebido pelo get
        $erro = '';
        
        switch ($request->get('erro')){
            case 0:
                break;
            case 1:
            $erro = 'Usuário ou senha não incorrtetos!';
        break;
        case 2:
            $erro = 'Você deve realizaro o login para acessar a página!';
            } 

        return view('site.login.login',['titulo'=> 'LOGIN','erro'=>$erro]);
    }
    public function autenticar(Request $request){
        
        $regras=[
            'usuario'=>'required|email',
            'senha'=>'required'
        ];
        $feedback = [
            'usuario.required' => 'Utilize seu email, como login',
            'usuario.email'=> 'Esse e-mail não é válido',
            'senha.required'=> 'O Campo senha é obrigatório!'
        ];
        
        $request->validate($regras,$feedback);

        //Recupera os parametros
        $email = $request->get('usuario');
        $password = $request->get('senha');
        
        //Inicia o model User
        $user = new User();

        $existe = $user->where('email',$email)
                    ->where('password',$password)
                    ->get()->first();

        $usuario = $existe;
        
        if(isset($usuario->name) && isset($usuario->name) != ''){
            session_start();
            $_SESSION['nome']= $usuario->name;
            $_SESSION['email']= $usuario->email;

            //dd($_SESSION);
            return redirect()->route('app.home');

        }else{ 
          return redirect()->route('site.login',['erro'=>1]);
        }
       
    }
    public function sair(){
        session_destroy();
        return redirect()->route('site.index');

    }
}
