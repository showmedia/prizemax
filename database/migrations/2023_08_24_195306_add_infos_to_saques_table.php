<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfosToSaquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saques', function (Blueprint $table) {
            $table->double('valor')->default(0);
            $table->boolean('status')->default(0);
            $table->string('tipochave')->nullable();
            $table->string('chave')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('saques', function (Blueprint $table) {
            //
        });
    }
}
