<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCamposToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('tipo_dni')->nullable();
            $table->string('dni')->unique();
            $table->string('direccion')->nullable();
            $table->string('telefono')->nullable();
            $table->string('foto')->default('profile/default.png');
            $table->boolean('condicion')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('tipo_dni');
            $table->dropColumn('dni');
            $table->dropColumn('direccion');
            $table->dropColumn('telefono');
            $table->dropColumn('puesto_id');
            $table->dropColumn('foto');
            $table->dropColumn('condicion');
            $table->dropColumn('prioridad_usuario_id');
        });
    }
}
