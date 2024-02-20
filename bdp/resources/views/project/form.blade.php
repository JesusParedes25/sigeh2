
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
                                <br>
                                <div class="form-group">
                                    {{ Form::label('tipo_proyecto') }}
                                    {{ Form::text('tipo_proyecto', $project->tipo_proyecto, ['class' => 'form-control' . ($errors->has('tipo_proyecto') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Proyecto']) }}
                                    {!! $errors->first('tipo_proyecto', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('quien_resgistra') }}
                                    {{ Form::text('quien_resgistra', $project->quien_resgistra, ['class' => 'form-control' . ($errors->has('quien_resgistra') ? ' is-invalid' : ''), 'placeholder' => 'Quien Resgistra']) }}
                                    {!! $errors->first('quien_resgistra', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('unidad_responsable') }}
                                    {{ Form::text('unidad_responsable', $project->unidad_responsable, ['class' => 'form-control' . ($errors->has('unidad_responsable') ? ' is-invalid' : ''), 'placeholder' => 'Unidad Responsable']) }}
                                    {!! $errors->first('unidad_responsable', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('uni_presupuestal') }}
                                    {{ Form::text('uni_presupuestal', $project->uni_presupuestal, ['class' => 'form-control' . ($errors->has('uni_presupuestal') ? ' is-invalid' : ''), 'placeholder' => 'Uni Presupuestal']) }}
                                    {!! $errors->first('uni_presupuestal', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('ramo_presupuestal') }}
                                    {{ Form::text('ramo_presupuestal', $project->ramo_presupuestal, ['class' => 'form-control' . ($errors->has('ramo_presupuestal') ? ' is-invalid' : ''), 'placeholder' => 'Ramo Presupuestal']) }}
                                    {!! $errors->first('ramo_presupuestal', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                    			<div class="form-group">
                                    {{ Form::label('fecha_registro') }}
                                    {{ Form::text('fecha_registro', $project->fecha_registro, ['class' => 'form-control' . ($errors->has('fecha_registro') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Registro']) }}
                                    {!! $errors->first('fecha_registro', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="form-group">
                                    {{ Form::label('georreferencia') }}
                                    {{ Form::text('georreferencia', $project->georreferencia, ['class' => 'form-control' . ($errors->has('georreferencia') ? ' is-invalid' : ''), 'placeholder' => 'Georreferencia']) }}
                                    {!! $errors->first('georreferencia', '<div class="invalid-feedback">:message</div>') !!}
                                </div>
                                <div class="f1-buttons">
                                    <button type="button" class="btn btn-next">Siguiente</button>
                                </div>
                            </fieldset>
                            <!--fin del paso 1 -->

                            <!---paso 2 -->
                            <fieldset>
                                <br>
                                <div class="form-group">
            {{ Form::label('descripcion') }}
            {{ Form::text('descripcion', $project->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' is-invalid' : ''), 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('situacion_act') }}
            {{ Form::text('situacion_act', $project->situacion_act, ['class' => 'form-control' . ($errors->has('situacion_act') ? ' is-invalid' : ''), 'placeholder' => 'Situacion Act']) }}
            {!! $errors->first('situacion_act', '<div class="invalid-feedback">:message</div>') !!}
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
            {{ Form::label('territorio') }}
            {{ Form::text('territorio', $project->territorio, ['class' => 'form-control' . ($errors->has('territorio') ? ' is-invalid' : ''), 'placeholder' => 'Territorio']) }}
            {!! $errors->first('territorio', '<div class="invalid-feedback">:message</div>') !!}
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
            {{ Form::label('alin_normativa') }}
            {{ Form::text('alin_normativa', $project->alin_normativa, ['class' => 'form-control' . ($errors->has('alin_normativa') ? ' is-invalid' : ''), 'placeholder' => 'Alin Normativa']) }}
            {!! $errors->first('alin_normativa', '<div class="invalid-feedback">:message</div>') !!}
        </div>
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