<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AdcDeaulfTimestampCategoriaProfissional extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table(
            'categorias_profissionais',
            function (Blueprint $table) {
                $table->dateTime('created_at')->useCurrent()->change();
                $table->dateTime('updated_at')->useCurrent()->change();
            }
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
