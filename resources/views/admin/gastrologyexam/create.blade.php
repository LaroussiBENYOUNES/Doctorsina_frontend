@extends('admin.layouts.master')

@section('content')
<div style="margin-left:150px;">
<div class="row">
    <div class="col-sm-10 col-sm-offset-2">
        <h3 style="margin-left:10px">New Gastrology Exam</h3>

        @if ($errors->any())
        	<div class="alert alert-danger" style="margin-left:12px">
        	    <ul>
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('route' => config('quickadmin.route').'.gastrologyexam.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('way', 'Way', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('way', old('way'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('gastroscopy', 'Gastroscopy', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('gastroscopy', old('gastroscopy'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('colonoscopy', 'Colonoscopy', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
        {!! Form::text('colonoscopy', old('colonoscopy'), array('class'=>'form-control')) !!}
        
    </div>
</div><div class="form-group">
    {!! Form::label('consultation_id', 'Consultation*', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::select('consultation_id', $consultation, old('consultation_id'), array('class'=>'form-control')) !!}  
        
    </div>
</div>

<div class="form-group">
    <div class="col-sm-6 col-sm-offset-2">
    {!! Form::submit( Add, array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}
    </div>
</div>

{!! Form::close() !!}
</div>
@endsection