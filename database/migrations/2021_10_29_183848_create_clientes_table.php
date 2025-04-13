<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('entidade');
            $table->string('email')->unique();
            $table->string('processo');
            $table->string('solicitacao');
            $table->string('situacao');
            $table->string('nome');
            $table->string('apelido');
            $table->date('aniversario');
            $table->string('bi');
            $table->date('validade');
            $table->integer('nuit');
            $table->integer('telefone1');
            $table->integer('telefone2')->nullable();
            $table->enum('genero', ['Masculino', 'Feminino']);
            $table->string('endereco');
            $table->string('banco')->nullable();
            $table->string('numeroconta')->nullable();
            $table->longText('observacao')->nullable();
            $table->foreign('user_id')
                    ->references('id')
                    ->on('users')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
