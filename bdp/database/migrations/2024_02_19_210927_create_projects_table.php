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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('tipo_proyecto');
            $table->string('quien_resgistra');
            $table->string('unidad_responsable');
            $table->string('uni_presupuestal');
            $table->string('ramo_presupuestal');
            $table->date('fecha_registro');
            
            $table->string('georreferencia');
            $table->string('descripcion');
            $table->string('situacion_act');
            $table->string('objetivos');
            $table->string('metas');
            $table->string('prog_presupuestario');
            $table->string('asignacion_obra');
            $table->string('modalidad');
            $table->string('beneficiarios');
            $table->string('territorio');
            $table->string('alin_normativa');
            $table->string('ped');
            $table->string('ods');
            $table->string('sectorial');
            $table->string('indicadores');
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
        Schema::dropIfExists('projects');
    }
};
