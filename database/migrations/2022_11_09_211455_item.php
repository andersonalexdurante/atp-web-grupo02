<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->boolean('devolvido');
            $table->foreignId('emprestador_id')->constrained('users');
            $table->foreignId('dono_id')->constrained('users');
            $table->timestamp('emprestado_em')->nullable();
            $table->timestamp('previsto_devolucao_em')->nullable();
            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
};
