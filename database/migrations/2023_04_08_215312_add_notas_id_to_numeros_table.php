<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNotasIdToNumerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('numeros', function (Blueprint $table) {
            $table->foreignId('notas_id')->constrained();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('numeros', function (Blueprint $table) {
            $table->foreignId('notas_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
