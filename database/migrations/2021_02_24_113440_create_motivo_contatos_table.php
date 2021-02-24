<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\MotivoContato;
class CreateMotivoContatosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motivo_contatos', function (Blueprint $table) {
            $table->id();
            $table->string('motivo_contato',50);
            $table->timestamps();
        });
        //Instacia dados no banco de dados-> movido para classe MotivoContatoSeeder
        //MotivoContato::create(['Dúvida']);
        //MotivoContato::create(['Elogio']);
        //MotivoContato::create(['Reclamação']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   //Remove as colunas
        Schema::dropIfExists('motivo_contatos');
    }
}
