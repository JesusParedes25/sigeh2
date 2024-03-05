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
                                {{ __('Projectos Registrados') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('projects.create') }}" class="btn btn-secondary btn-sm float-right"  data-placement="left">
                                  {{ __('Crear nuevo proyecto') }}
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
										<th>Sector</th>
										<!--<th>Quien Resgistra</th>
										<th>Unidad Responsable</th>
										<th>Uni Presupuestal</th>
										<th>Ramo Presupuestal</th>
										<th>Fecha Registro</th>
										<th>Georreferencia</th>-->
										<th>Nombre Proyecto</th>
										<th>Descripcion</th>
										<!--<th>Situacion Act</th>
										<th>Objetivos</th>
										<th>Metas</th>
										<th>Prog Presupuestario</th>
										<th>Asignacion Obra</th>
										<th>Modalidad</th>
										<th>Beneficiarios</th>
										<th>Alin Normativa</th>
										<th>Region</th>
										<th>Municipio</th>
										<th>Localidad</th>
										<th>Colonia</th>
										<th>Ped</th>
										<th>Ods</th>
										<th>Sectorial</th>
										<th>Indicadores</th>
										<th>Tipo</th>
										<th>Id Usr</th>-->
										<th>Porcentaje</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($projects as $project)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $project->tipo_proyecto }}</td>
											<td>{{ $project->sector }}</td>
											<!--<td>{{ $project->quien_resgistra }}</td>
											<td>{{ $project->unidad_responsable }}</td>
											<td>{{ $project->uni_presupuestal }}</td>
											<td>{{ $project->ramo_presupuestal }}</td>
											<td>{{ $project->fecha_registro }}</td>
											<td>{{ $project->georreferencia }}</td>-->
											<td>{{ $project->nombre_proyecto }}</td>
											<td>{{ $project->descripcion }}</td>
											<!--<td>{{ $project->situacion_act }}</td>
											<td>{{ $project->objetivos }}</td>
											<td>{{ $project->metas }}</td>
											<td>{{ $project->prog_presupuestario }}</td>
											<td>{{ $project->asignacion_obra }}</td>
											<td>{{ $project->modalidad }}</td>
											<td>{{ $project->beneficiarios }}</td>
											<td>{{ $project->alin_normativa }}</td>
											<td>{{ $project->region }}</td>
											<td>{{ $project->municipio }}</td>
											<td>{{ $project->localidad }}</td>
											<td>{{ $project->colonia }}</td>
											<td>{{ $project->ped }}</td>
											<td>{{ $project->ods }}</td>
											<td>{{ $project->sectorial }}</td>
											<td>{{ $project->indicadores }}</td>
											<td>{{ $project->tipo }}</td>
											<td>{{ $project->id_usr }}</td>-->
											<td>{{ '80%' }}</td>

                                            <td>
                                                <form action="{{ route('projects.destroy',$project->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-secondary " href="{{ route('projects.show',$project->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Ver') }}</a>
                                                    <a class="btn btn-sm btn-secondary" href="{{ route('projects.edit',$project->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Editar') }}</a>
													<a class="btn btn-sm btn-secondary " href="{{ route('projects.show',$project->id) }}"><i class="fa fa-fw fa-file"></i> {{ __('Documentos') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Eliminar') }}</button>
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
