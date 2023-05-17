<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListaFavoritosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lista_favoritos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_album');
            $table->foreign('id_album')->references('id')->on('albumes')->onDelete('cascade');
            $table->unsignedBigInteger('id_favoritos');
            $table->foreign('id_favoritos')->references('id')->on('favoritos')->onDelete('cascade');
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
        Schema::dropIfExists('lista_favoritos');
    }
}
