
<div class="top-content">
            <div class="container">
                
                <div class="row">
                    <div class="form-box">
                    <form method="POST" action="{{ route('projects.store') }}"  role="form" enctype="multipart/form-data" class="f1">

                    		<h3>Registrar Proyecto</h3>
                    		<div class="f1-steps">
                    			<div class="f1-progress">
                    			    <div class="f1-progress-line" data-now-value="16.66" data-number-of-steps="3" style="width: 16.66%;"></div>
                    			</div>
                    			<div class="f1-step active">
                    				<div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    				<p>Paso 1</p>
                    			</div>
                    			<div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    				<p>Paso 2</p>
                    			</div>
                    		    <div class="f1-step">
                    				<div class="f1-step-icon"><i class="fa fa-user"></i></div>
                    				<p>Fin</p>
                    			</div>
                    		</div>
                    		
                    		
                            <!--paso 1 -->
                            <fieldset>
                                
                                <div class="form-group">
                                    <div class="col-md-2">
                                    {{ Form::label('TIPO DE PROYECTO:') }}                                
                                    </div>
                                    <div class="col-md-5">                                
                                    {{ Form::text('tipo_proyecto', $project->tipo_proyecto, ['class' => 'form-control' . ($errors->has('tipo_proyecto') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Proyecto']) }}
                                    {!! $errors->first('tipo_proyecto', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="col-md-1">
                                    {{ Form::label('SECTOR:') }}                                
                                    </div>
                                    <div class="col-md-4">                                
                                    {{ Form::text('sector', $project->sector, ['class' => 'form-control' . ($errors->has('sector') ? ' is-invalid' : ''), 'placeholder' => 'Sector']) }}
                                    {!! $errors->first('sector', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <div class="col-md-6">
                                    {{ Form::label('NOMBRE DE LA DEPENDENCIA/ORGANISMO/MUNICIPIO/CIUDADANÍA:') }}                                
                                    </div>
                                    <div class="col-md-6">                                
                                    {{ Form::text('quien_resgistra', $project->quien_resgistra, ['class' => 'form-control' . ($errors->has('quien_resgistra') ? ' is-invalid' : ''), 'placeholder' => 'Quien Resgistra']) }}
                                    {!! $errors->first('quien_resgistra', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <div class="col-md-2">
                                    {{ Form::label('UNIDAD RESPONSABLE:') }}                               
                                    </div>
                                    <div class="col-md-4">                                
                                    {{ Form::text('unidad_responsable', $project->unidad_responsable, ['class' => 'form-control' . ($errors->has('unidad_responsable') ? ' is-invalid' : ''), 'placeholder' => 'Unidad Responsable']) }}
                                    {!! $errors->first('unidad_responsable', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="col-md-3">
                                    {{ Form::label('UNIDAD PRESUPUESTAL:') }}                                
                                    </div>
                                    <div class="col-md-3">                                
                                    {{ Form::text('uni_presupuestal', $project->uni_presupuestal, ['class' => 'form-control' . ($errors->has('uni_presupuestal') ? ' is-invalid' : ''), 'placeholder' => 'Uni Presupuestal']) }}
                                    {!! $errors->first('uni_presupuestal', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>          
            
                                </div><br>
                                <div class="form-group">
                                    <div class="col-md-2">
                                    {{ Form::label('RAMO PRESUPUESTAL:') }}                               
                                    </div>
                                    <div class="col-md-4">                                
                                    {{ Form::text('ramo_presupuestal', $project->ramo_presupuestal, ['class' => 'form-control' . ($errors->has('ramo_presupuestal') ? ' is-invalid' : ''), 'placeholder' => 'Ramo Presupuestal']) }}
                                    {!! $errors->first('ramo_presupuestal', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                    <div class="col-md-2">
                                    {{ Form::label('FECHA DE REGISTRO:') }}                                
                                    </div>
                                    <div class="col-md-4">                                
                                    {{ Form::text('fecha_registro', $project->fecha_registro, ['class' => 'form-control' . ($errors->has('fecha_registro') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Registro']) }}
                                    {!! $errors->first('fecha_registro', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>         
                                </div><br>
                                <div class="form-group">
                                    <div class="col-md-2">
                                    {{ Form::label('GEORREFERENCIACIÓN:') }}                                
                                    </div>
                                    <div class="col-md-6">                                
                                    {{ Form::text('georreferencia', $project->georreferencia, ['class' => 'form-control' . ($errors->has('georreferencia') ? ' is-invalid' : ''), 'placeholder' => 'Georreferencia']) }}
                                    {!! $errors->first('georreferencia', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div><br>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="f1-buttons">
                                        <button type="button" class="btn btn-next">Siguiente</button>
                                    </div>            
                                    </div>
                                    
                                </div>
                                
           
        
                                
                            </fieldset>
                            <!--fin del paso 1 -->

                            <!---paso 2 -->
                            <fieldset>
                                <div class="form-group">
                                    <div class="col-md-3">
                                    {{ Form::label('NOMBRE DEL PROYECTO:') }}                                
                                    </div>
                                    <div class="col-md-9">                                
                                    {{ Form::text('nombre_proyecto', $project->nombre_proyecto, ['class' => 'form-control' . ($errors->has('nombre_proyecto') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Proyecto']) }}
                                    {!! $errors->first('nombre_proyecto', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-2">
                                    {{ Form::label('DESCRIPCIÓN:') }}                                
                                    </div>
                                    <div class="col-md-10">                                
                                    {{ Form::text('descripcion', $project->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
                                    {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-3">
                                    {{ Form::label('ANÁLISIS DE LA SITUACIÓN ACTUAL:') }}                                
                                    </div>
                                    <div class="col-md-9">                                
                                    {{ Form::text('situacion_act', $project->situacion_act, ['class' => 'form-control' . ($errors->has('situacion_act') ? ' is-invalid' : ''), 'placeholder' => 'Situacion Act']) }}
                                    {!! $errors->first('situacion_act', '<div class="invalid-feedback">:message</div>') !!}
                                    </div>
                                </div>         

        
        <div class="form-group">
            {{ Form::label('objetivos') }}
            {{ Form::text('objetivos', $project->objetivos, ['class' => 'form-control' . ($errors->has('objetivos') ? ' is-invalid' : ''), 'placeholder' => 'Objetivos']) }}
            {!! $errors->first('objetivos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('metas') }}
            {{ Form::text('metas', $project->metas, ['class' => 'form-control' . ($errors->has('metas') ? ' is-invalid' : ''), 'placeholder' => 'Metas']) }}
            {!! $errors->first('metas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('prog_presupuestario') }}
            {{ Form::text('prog_presupuestario', $project->prog_presupuestario, ['class' => 'form-control' . ($errors->has('prog_presupuestario') ? ' is-invalid' : ''), 'placeholder' => 'Prog Presupuestario']) }}
            {!! $errors->first('prog_presupuestario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('asignacion_obra') }}
            {{ Form::text('asignacion_obra', $project->asignacion_obra, ['class' => 'form-control' . ($errors->has('asignacion_obra') ? ' is-invalid' : ''), 'placeholder' => 'Asignacion Obra']) }}
            {!! $errors->first('asignacion_obra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('modalidad') }}
            {{ Form::text('modalidad', $project->modalidad, ['class' => 'form-control' . ($errors->has('modalidad') ? ' is-invalid' : ''), 'placeholder' => 'Modalidad']) }}
            {!! $errors->first('modalidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('beneficiarios') }}
            {{ Form::text('beneficiarios', $project->beneficiarios, ['class' => 'form-control' . ($errors->has('beneficiarios') ? ' is-invalid' : ''), 'placeholder' => 'Beneficiarios']) }}
            {!! $errors->first('beneficiarios', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('alin_normativa') }}
            {{ Form::text('alin_normativa', $project->alin_normativa, ['class' => 'form-control' . ($errors->has('alin_normativa') ? ' is-invalid' : ''), 'placeholder' => 'Alin Normativa']) }}
            {!! $errors->first('alin_normativa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('region') }}
            {{ Form::text('region', $project->region, ['class' => 'form-control' . ($errors->has('region') ? ' is-invalid' : ''), 'placeholder' => 'Region']) }}
            {!! $errors->first('region', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('municipio') }}
            {{ Form::text('municipio', $project->municipio, ['class' => 'form-control' . ($errors->has('municipio') ? ' is-invalid' : ''), 'placeholder' => 'Municipio']) }}
            {!! $errors->first('municipio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('localidad') }}
            {{ Form::text('localidad', $project->localidad, ['class' => 'form-control' . ($errors->has('localidad') ? ' is-invalid' : ''), 'placeholder' => 'Localidad']) }}
            {!! $errors->first('localidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('colonia') }}
            {{ Form::text('colonia', $project->colonia, ['class' => 'form-control' . ($errors->has('colonia') ? ' is-invalid' : ''), 'placeholder' => 'Colonia']) }}
            {!! $errors->first('colonia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Atrás</button>
                                    <button type="button" class="btn btn-next">Siguiente</button>
                                </div>
                            </fieldset>
                            <!--fin del paso 2 -->

                            <!--paso fin -->
                            <fieldset>
                                <br>
                                <div class="form-group">
            {{ Form::label('ped') }}
            {{ Form::text('ped', $project->ped, ['class' => 'form-control' . ($errors->has('ped') ? ' is-invalid' : ''), 'placeholder' => 'Ped']) }}
            {!! $errors->first('ped', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ods') }}
            {{ Form::text('ods', $project->ods, ['class' => 'form-control' . ($errors->has('ods') ? ' is-invalid' : ''), 'placeholder' => 'Ods']) }}
            {!! $errors->first('ods', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('sectorial') }}
            {{ Form::text('sectorial', $project->sectorial, ['class' => 'form-control' . ($errors->has('sectorial') ? ' is-invalid' : ''), 'placeholder' => 'Sectorial']) }}
            {!! $errors->first('sectorial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('indicadores') }}
            {{ Form::text('indicadores', $project->indicadores, ['class' => 'form-control' . ($errors->has('indicadores') ? ' is-invalid' : ''), 'placeholder' => 'Indicadores']) }}
            {!! $errors->first('indicadores', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipo') }}
            {{ Form::text('tipo', $project->tipo, ['class' => 'form-control' . ($errors->has('tipo') ? ' is-invalid' : ''), 'placeholder' => 'Tipo']) }}
            {!! $errors->first('tipo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_usr') }}
            {{ Form::text('id_usr', $project->id_usr, ['class' => 'form-control' . ($errors->has('id_usr') ? ' is-invalid' : ''), 'placeholder' => 'Id Usr']) }}
            {!! $errors->first('id_usr', '<div class="invalid-feedback">:message</div>') !!}
        </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-previous">Atrás</button>
                                    <button type="submit" class="btn btn-submit">Guardar Información</button>
                                </div>
                            </fieldset>
                            <!--fin -->
                    	
                    	</form>
                    </div>
                </div>
                    
            </div>
        </div>