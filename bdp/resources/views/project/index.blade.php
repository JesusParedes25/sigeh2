@extends('layouts.app')

@section('template_title')
    Project
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Project') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('projects.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Tipo Proyecto</th>
										<th>Quien Resgistra</th>
										<th>Unidad Responsable</th>
										<th>Uni Presupuestal</th>
										<th>Ramo Presupuestal</th>
										<th>Fecha Registro</th>
										<th>Georreferencia</th>
										<th>Descripcion</th>
										<th>Situacion Act</th>
										<th>Objetivos</th>
										<th>Metas</th>
										<th>Prog Presupuestario</th>
										<th>Asignacion Obra</th>
										<th>Modalidad</th>
										<th>Beneficiarios</th>
										<th>Territorio</th>
										<th>Alin Normativa</th>
										<th>Ped</th>
										<th>Ods</th>
										<th>Sectorial</th>
										<th>Indicadores</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $project->tipo_proyecto }}</td>
											<td>{{ $project->quien_resgistra }}</td>
											<td>{{ $project->unidad_responsable }}</td>
											<td>{{ $project->uni_presupuestal }}</td>
											<td>{{ $project->ramo_presupuestal }}</td>
											<td>{{ $project->fecha_registro }}</td>
											<td>{{ $project->georreferencia }}</td>
											<td>{{ $project->descripcion }}</td>
											<td>{{ $project->situacion_act }}</td>
											<td>{{ $project->objetivos }}</td>
											<td>{{ $project->metas }}</td>
											<td>{{ $project->prog_presupuestario }}</td>
											<td>{{ $project->asignacion_obra }}</td>
											<td>{{ $project->modalidad }}</td>
											<td>{{ $project->beneficiarios }}</td>
											<td>{{ $project->territorio }}</td>
											<td>{{ $project->alin_normativa }}</td>
											<td>{{ $project->ped }}</td>
											<td>{{ $project->ods }}</td>
											<td>{{ $project->sectorial }}</td>
											<td>{{ $project->indicadores }}</td>

                                            <td>
                                                <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('projects.show',$project->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('projects.edit',$project->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $projects->links() !!}
            </div>
        </div>
    </div>
@endsection
