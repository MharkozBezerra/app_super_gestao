<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;
use App\SiteContato;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        //Instaciado pelo objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome  = 'Fornecedor Teste';
        $fornecedor->site  = 'grupo.fornecedorteste.com.br';
        $fornecedor->uf    = 'SP';
        $fornecedor->email = 'fornecedorteste@grupo.com.br';
        $fornecedor->save(); 
        //Usando método create.
        Fornecedor::create([
            'nome'=>"Fornecedor Teste2",
            'site'=>'grupo.fornecedorteste2.com.br',
            'uf'=> 'CE',
            'email'=> 'fornecedorteste2@grupo.com.br'
        ]);
        
           

    }
}
