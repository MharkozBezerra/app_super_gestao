<?php

use App\SiteContato;
use Illuminate\Database\Seeder;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        $contato = new SiteContato();
        $contato->nome = 'Sistema SG';
        $contato->telefone = '(11) 99999-88888';
        $contato->email = 'contato@sg.com.br';
        $contato->motivo_contato = '1';
        $contato->mensagem = 'Seja bem-vindo ao sistema Super Gestão';
        $contato->save();

        SiteContato::create([
            'nome'=>"Sistema SG II",
            'telefone'=>'(11) 90000-11111',
            'email'=> 'cliente@contato.com.br',
            'motivo_contato'=> '2',
            'mensagem'=> 'Seja bem-vindo ao sistema Super Gestão II'
        ]);
        */
        //insere 100 dados no banco de dados
        factory(SiteContato::class, 100)->create();         
    }
}
