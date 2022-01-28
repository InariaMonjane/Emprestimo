<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrestacaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prestacaos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emprestimo_id');
            $table->integer('numero');
            $table->double('capital', 8, 2);
            $table->float('taxa', 8, 2);
            $table->double('juros', 8, 2);
            $table->double('AmCapital', 8, 2);
            $table->double('opcao1', 8, 2);
            $table->double('opcao2', 8, 2);
            $table->date('dataPrevista');
            $table->enum('estado', ['Pendente', 'Pago']);
            $table->date('dataPagamento')->nullable();
            $table->timestamps();
            $table->foreign('emprestimo_id')
                ->references('id')
                ->on('emprestimos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prestacaos');
    }
}
