@extends('admin.layouts.master')

@section('content')

<div style="margin-left:150px;">
<div class="row">
    <div class="col-sm-6 col-sm-offset-2">
        <h3 style="margin-left:10px">New General Exam</h3><br>

        @if ($errors->any())
        	<div class="alert alert-danger" style="margin-left:12px">
        	    <ul>
                    {!! implode('', $errors->all('<div class="error">:message</div>')) !!}
                </ul>
        	</div>
        @endif
    </div>
</div>

{!! Form::open(array('route' => config('quickadmin.route').'.generalexam.store', 'id' => 'form-with-validation', 'class' => 'form-horizontal')) !!}

<div class="form-group">
    {!! Form::label('weight', 'Wheight', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::text('weight', old('weight'), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('size', 'Size', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::text('size', old('size'), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('fever', 'Fever', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::text('fever', old('fever'), array('class'=>'form-control')) !!}

    </div>
</div>
<div class="form-group">
    {!! Form::label('consultation_id', 'Consultation', array('class'=>'col-sm-2 control-label')) !!}
    <div class="col-sm-6">
    {!! Form::select('consultation_id', $consultation, old('consultation_id'), array('class'=>'form-control')) !!}  
    </div>
</div>
<div class="form-group" >
    <div class="col-sm-6 col-sm-offset-2">
    {!! Form::submit( Add, array('class' => 'btn', 'style' => 'background-color: #2A3F54; color: #FFFFFF;')) !!}

    </div>
</div>
 
{!! Form::close() !!}
</div>
@endsection