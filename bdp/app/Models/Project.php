<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @property $id
 * @property $tipo_proyecto
 * @property $quien_resgistra
 * @property $unidad_responsable
 * @property $uni_presupuestal
 * @property $ramo_presupuestal
 * @property $fecha_registro
 * @property $georreferencia
 * @property $descripcion
 * @property $situacion_act
 * @property $objetivos
 * @property $metas
 * @property $prog_presupuestario
 * @property $asignacion_obra
 * @property $modalidad
 * @property $beneficiarios
 * @property $territorio
 * @property $alin_normativa
 * @property $ped
 * @property $ods
 * @property $sectorial
 * @property $indicadores
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Project extends Model
{
    
    static $rules = [
		'tipo_proyecto' => 'required',
		'quien_resgistra' => 'required',
		'unidad_responsable' => 'required',
		'uni_presupuestal' => 'required',
		'ramo_presupuestal' => 'required',
		'fecha_registro' => 'required',
		'georreferencia' => 'required',
		'descripcion' => 'required',
		'situacion_act' => 'required',
		'objetivos' => 'required',
		'metas' => 'required',
		'prog_presupuestario' => 'required',
		'asignacion_obra' => 'required',
		'modalidad' => 'required',
		'beneficiarios' => 'required',
		'territorio' => 'required',
		'alin_normativa' => 'required',
		'ped' => 'required',
		'ods' => 'required',
		'sectorial' => 'required',
		'indicadores' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['tipo_proyecto','quien_resgistra','unidad_responsable','uni_presupuestal','ramo_presupuestal','fecha_registro','georreferencia','descripcion','situacion_act','objetivos','metas','prog_presupuestario','asignacion_obra','modalidad','beneficiarios','territorio','alin_normativa','ped','ods','sectorial','indicadores'];



}
