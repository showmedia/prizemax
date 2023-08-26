<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContasIdToSaquesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('saques', function (Blueprint $table) {
            $table->foreignId('contas_id')->nullable()->constrained();
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
            $table->foreignId('contas_id')
            ->constrained()
            ->onDelete('cascade');
        });
    }
}
