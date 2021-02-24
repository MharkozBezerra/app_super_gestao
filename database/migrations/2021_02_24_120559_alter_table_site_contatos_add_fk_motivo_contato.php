<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableSiteContatosAddFkMotivoContato extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Adiciona a  coluna motivo contatos id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->unsignedBigInteger('motivo_contatos_id');
        });
        
         //Atualiza todas os dados para a motivo_contatos_id
         DB::statement('update site_contatos set motivo_contatos_id = motivo_contato');

        //Cria a fk  e remove a coluna motivo_contato
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->foreign('motivo_contatos_id')->references('id')->on('sg.motivo_contatos');
            $table->dropColumn('motivo_contato');
        });

       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Cria a motivo contatos e remove a chave fk
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contato');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });
        //Atualiza as ações no banco de dados
        DB::statement('update site_contatos set motivo_contato =  motivo_contatos_id');

        //Remove a  coluna motivo contatos id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });
    }
}
