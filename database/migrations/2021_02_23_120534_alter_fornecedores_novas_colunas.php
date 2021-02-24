<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterFornecedoresNovasColunas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Altera  uma tabela do banco de dados.
        Schema::table('fornecedores', function (Blueprint $table) {
            $table->string('uf',2);
            $table->string('email',150);
            
        });
    
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fornecedores', function (Blueprint $table) {
            //Remover uma única coluna.
            //$table->dropColumn('uf');
            //Remove um array de colunas
            $table->dropColumn('uf','email');

            
        });
    }
}
