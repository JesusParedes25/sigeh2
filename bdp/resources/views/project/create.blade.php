@extends('layouts.app')

@section('template_title')
    {{ __('Create') }} Projects 
@endsection

@section('content')
<div class="top-content">
            <div class="container">
                
                <div class="row">
                    <div class="form-box">
                        <form method="POST" action="{{ route('projects.store') }}"  role="form" enctype="multipart/form-data" class="f1">
                    	

                        @csrf

                        @include('project.form')
                    	
                    	</form>
                    </div>
                </div>
                    
            </div>
        </div>
    
@endsection 
