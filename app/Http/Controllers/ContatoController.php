<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{
   //Acessa a view que está na pasta resource / view / site / contato.blade.php
   public function contato(Request $request)
   {

      $motivo_contatos = MotivoContato::all();
      return view('site.contato', ['titulo' => 'Contato','motivo_contatos'=> $motivo_contatos]);
   }

   public function salvar(Request $request)
   {

      $regras = [
         'nome'               => 'required | min:3|max:40', //Campo não pode ser nullo ter mais de 3 caracteres menos de 40 caracteres
         'telefone'           => 'required', 
         'email'              => 'email',                   //-> Verifica se o dados informados é um email válido
         'motivo_contatos_id' => 'required',
         'mensagem'           => 'required | max:149'       //Campo de mensagem, não pode ser nulla, ter menos de 149 caracteres.
      ];
      //Define o retorno de mensagem de erros
      $feedback = [
         'nome.required'               => 'O campo nome deve ser informado',
         'nome.min'                    => 'O nome está muito pequeno, não acha? acima de 3 letras!',
         'nome.max'                    => 'O nome está muito grande, não acha?',
         'telefone.required'           => 'Informe um telefone, para que possamos entrar em contato',
         'email.email'                 => 'E-mail inválido',
         'motivo_contatos_id.required' => 'Informe o motivo do contato!',
         'mensagem.required'           => 'Deixe sua mensagem para nós',
         'mensagem.max'                => 'Mensagem muito grande, para ser enviada',
      ];

      $request->validate($regras, $feedback);
      //Salva os dados no banco de dados
      SiteContato::create($request->all());
      //Retorna para página raiz da aplicação
      return redirect()->route('site.index');
      //return view('site.contato', ['titulo' => 'Contato']);
   }
}
