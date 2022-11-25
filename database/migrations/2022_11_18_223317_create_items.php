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
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('idOwner');
            $table->string('name', 64)->nullable(false);
            $table->string('nameReceiver');
            $table->string('contactReceiver');
            $table->timestamp('dateBorrowed')->nullable(false)->default(now());
            $table->timestamp('dateReturnForecast')->nullable(true);
            $table->timestamp('dateReturned')->nullable(true);
            $table->boolean('returned')->nullable(false);
            $table->foreign('idOwner')->references('id')->on('users');
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
        Schema::dropIfExists('itens');
    }
};
