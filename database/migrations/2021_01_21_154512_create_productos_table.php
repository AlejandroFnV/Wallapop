<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producto', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('idusuario')->unsigned();
            $table->bigInteger('idcategoria')->unsigned();
            
            $table->string('nombre', 80);
            $table->text('descripcion');
            $table->string('uso');
            $table->decimal('precio', 6, 2);
            $table->date('fecha');
            $table->integer('estado');
            $table->longText('foto');
            $table->timestamps();
            $table->softDeletes();
            
            $table->foreign('idusuario')->references('id')->on('users');
            // $table->foreign('idcategoria')->references('id')->on('categoria');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('producto');
    }
}
