<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Project
 *
 * @property $id
 * @property $tipo_proyecto
 * @property $sector
 * @property $quien_resgistra
 * @property $unidad_responsable
 * @property $uni_presupuestal
 * @property $ramo_presupuestal
 * @property $fecha_registro
 * @property $georreferencia
 * @property $nombre_proyecto
 * @property $descripcion
 * @property $situacion_act
 * @property $objetivos
 * @property $metas
 * @property $prog_presupuestario
 * @property $asignacion_obra
 * @property $modalidad
 * @property $beneficiarios
 * @property $alin_normativa
 * @property $region
 * @property $municipio
 * @property $localidad
 * @property $colonia
 * @property $ped
 * @property $ods
 * @property $sectorial
 * @property $indicadores
 * @property $tipo
 * @property $id_usr
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
		'sector' => 'required',
		'quien_resgistra' => 'required',
		'unidad_responsable' => 'required',
		'uni_presupuestal' => 'required',
		'ramo_presupuestal' => 'required',
		'fecha_registro' => 'required',
		'georreferencia' => 'required',
		'nombre_proyecto' => 'required',
		'descripcion' => 'required',
		'situacion_act' => 'required',
		'objetivos' => 'required',
		'metas' => 'required',
		'prog_presupuestario' => 'required',
		'asignacion_obra' => 'required',
		'modalidad' => 'required',
		'beneficiarios' => 'required',
		'alin_normativa' => 'required',
		'region' => 'required',
		'municipio' => 'required',
		'localidad' => 'required',
		'colonia' => 'required',
		'ped' => 'required',
		'ods' => 'required',
		'sectorial' => 'required',
		'indicadores' => 'required',
		'tipo' => 'required',
		'user_id' => 'required',
		
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id','tipo_proyecto','sector','quien_resgistra','unidad_responsable','uni_presupuestal','ramo_presupuestal','fecha_registro','georreferencia','nombre_proyecto','descripcion','situacion_act','objetivos','metas','prog_presupuestario','asignacion_obra','modalidad','beneficiarios','alin_normativa','region','municipio','localidad','colonia','ped','ods','sectorial','indicadores','tipo'];



}
