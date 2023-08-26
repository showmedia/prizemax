<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSorteiosIdToPremiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('premios', function (Blueprint $table) {
            $table->foreignId('sorteios_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('premios', function (Blueprint $table) {
            
                $table->foreignId('sorteios_id')
                ->constrained()
                ->onDelete('cascade');
      
        });
    }
}
