<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContabilidadesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contabilidades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emprestimo_id')->nullable();
            $table->unsignedBigInteger('prestacao_id')->nullable();
            $table->string('descricao');
            $table->double('debito', 8, 2)->default(0.00);
            $table->double('credito', 8, 2)->default(0.00);
            $table->double('saldo', 8, 2)->default(0.00);
            $table->timestamps();
            //Relationships
            $table->foreign('emprestimo_id')
                ->references('id')
                ->on('emprestimos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreign('prestacao_id')
                ->references('id')
                ->on('prestacaos')
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
        Schema::dropIfExists('contabilidades');
    }
}
