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
            $table->unsignedBigInteger('idReceiver');
            $table->string('name', 64)->nullable(false);
            $table->timestamp('dateBorrowed')->nullable(true);
            $table->timestamp('dateReturnForecast')->nullable(false);
            $table->boolean('returned')->nullable(false);
            $table->foreign('idOwner')->references('id')->on('users');
            $table->foreign('idReceiver')->references('id')->on('users');
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
