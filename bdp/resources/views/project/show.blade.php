@extends('layouts.app')

@section('template_title')
    {{ $project->name ?? "{{ __('Show') Project" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Project</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('projects.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Tipo Proyecto:</strong>
                            {{ $project->tipo_proyecto }}
                        </div>
                        <div class="form-group">
                            <strong>Quien Resgistra:</strong>
                            {{ $project->quien_resgistra }}
                        </div>
                        <div class="form-group">
                            <strong>Unidad Responsable:</strong>
                            {{ $project->unidad_responsable }}
                        </div>
                        <div class="form-group">
                            <strong>Uni Presupuestal:</strong>
                            {{ $project->uni_presupuestal }}
                        </div>
                        <div class="form-group">
                            <strong>Ramo Presupuestal:</strong>
                            {{ $project->ramo_presupuestal }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Registro:</strong>
                            {{ $project->fecha_registro }}
                        </div>
                        <div class="form-group">
                            <strong>Georreferencia:</strong>
                            {{ $project->georreferencia }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $project->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Situacion Act:</strong>
                            {{ $project->situacion_act }}
                        </div>
                        <div class="form-group">
                            <strong>Objetivos:</strong>
                            {{ $project->objetivos }}
                        </div>
                        <div class="form-group">
                            <strong>Metas:</strong>
                            {{ $project->metas }}
                        </div>
                        <div class="form-group">
                            <strong>Prog Presupuestario:</strong>
                            {{ $project->prog_presupuestario }}
                        </div>
                        <div class="form-group">
                            <strong>Asignacion Obra:</strong>
                            {{ $project->asignacion_obra }}
                        </div>
                        <div class="form-group">
                            <strong>Modalidad:</strong>
                            {{ $project->modalidad }}
                        </div>
                        <div class="form-group">
                            <strong>Beneficiarios:</strong>
                            {{ $project->beneficiarios }}
                        </div>
                        <div class="form-group">
                            <strong>Territorio:</strong>
                            {{ $project->territorio }}
                        </div>
                        <div class="form-group">
                            <strong>Alin Normativa:</strong>
                            {{ $project->alin_normativa }}
                        </div>
                        <div class="form-group">
                            <strong>Ped:</strong>
                            {{ $project->ped }}
                        </div>
                        <div class="form-group">
                            <strong>Ods:</strong>
                            {{ $project->ods }}
                        </div>
                        <div class="form-group">
                            <strong>Sectorial:</strong>
                            {{ $project->sectorial }}
                        </div>
                        <div class="form-group">
                            <strong>Indicadores:</strong>
                            {{ $project->indicadores }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
